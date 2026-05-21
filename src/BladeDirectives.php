<?php

namespace mindtwo\Spaceless;

class BladeDirectives
{
    /**
     * Start a new output buffer for the @spaceless directive.
     */
    public function spaceless(): void
    {
        if (! $this->isEnabled()) {
            return;
        }

        ob_start();
    }

    /**
     * Flush the active output buffer and strip whitespace between HTML tags.
     *
     * Whitespace is preserved inside any tag listed under
     * `spaceless.expelled_tags` (e.g. <pre>, <script>, <style>, <textarea>).
     */
    public function endSpaceless(): ?string
    {
        if (! $this->isEnabled()) {
            return null;
        }

        $buffer = (string) ob_get_clean();

        /** @var array<int, string> $expelledTags */
        $expelledTags = (array) config('spaceless.expelled_tags', []);
        $expelled = implode('|', $expelledTags);

        $pattern = '~(?>[^\S]\s*|\s{2,})(?=[^<]*+(?:<(?!/?(?:'.$expelled.')\b)[^<]*+)*+(?:<(?>'.$expelled.')\b|\z))~Six';

        $stripped = preg_replace($pattern, ' ', $buffer);

        if ($stripped === null) {
            return $buffer;
        }

        return str_replace('> <', '><', $stripped);
    }

    /**
     * Determine if the spaceless directive is enabled.
     */
    public function isEnabled(): bool
    {
        return (bool) config('spaceless.enabled', true);
    }
}
