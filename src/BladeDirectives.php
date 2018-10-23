<?php

namespace mindtwo\Spaceless;

class BladeDirectives
{
    public function spaceless()
    {
        if ($this->isEnabled()) {
            ob_start();
        }
    }

    /**
     * @return string|null
     *
     * @throws \Exception
     */
    public function endSpaceless()
    {
        if ($this->isEnabled()) {

            $buffer = ob_get_clean();
            $expelled_tags = implode('|', config('spaceless.expelled_tags', []));
            
            $regexp = '~(?>[^\S]\s*|\s{2,})(?=[^<]*+(?:<(?!/?(?:' . $expelled_tags . ')\b)[^<]*+)*+(?:<(?>' . $expelled_tags . ')\b|\z))~Six';
            $result = preg_replace($regexp, ' ', $buffer);

            return ($result !== null) ? $result : $buffer;
        }

        return null;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return config('spaceless.enabled', true);
    }
}
