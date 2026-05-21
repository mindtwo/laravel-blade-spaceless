<?php

use Illuminate\Support\Facades\Blade;
use mindtwo\Spaceless\BladeDirectives;

it('compiles the @spaceless and @endspaceless directives', function (): void {
    $compiled = Blade::compileString('@spaceless<div>foo</div>@endspaceless');

    expect($compiled)
        ->toContain('->spaceless()')
        ->toContain('->endSpaceless()');
});

it('collapses whitespace between adjacent HTML tags', function (): void {
    $template = "@spaceless<div>\n    <p>hi</p>\n</div>@endspaceless";

    expect(Blade::render($template))->toBe('<div><p>hi</p></div>');
});

it('removes a single space between adjacent tags (issue #4)', function (): void {
    $template = '@spaceless<span>foo</span> <span>bar</span>@endspaceless';

    expect(Blade::render($template))->toBe('<span>foo</span><span>bar</span>');
});

it('preserves whitespace inside expelled tags', function (string $tag): void {
    $template = "@spaceless<div>  <{$tag}>  preserve me  </{$tag}>  </div>@endspaceless";

    expect(Blade::render($template))->toContain("<{$tag}>  preserve me  </{$tag}>");
})->with(['pre', 'script', 'style', 'textarea']);

it('honours custom expelled tags from configuration', function (): void {
    config()->set('spaceless.expelled_tags', ['code']);

    $template = '@spaceless<div>  <code>  keep  </code>  </div>@endspaceless';

    expect(Blade::render($template))->toContain('<code>  keep  </code>');
});

it('renders the original buffer when disabled', function (): void {
    config()->set('spaceless.enabled', false);

    $template = "@spaceless<div>\n    <p>hi</p>\n</div>@endspaceless";

    expect(Blade::render($template))->toBe("<div>\n    <p>hi</p>\n</div>");
});

it('reports the enabled state from configuration', function (): void {
    config()->set('spaceless.enabled', true);
    expect(app(BladeDirectives::class)->isEnabled())->toBeTrue();

    config()->set('spaceless.enabled', false);
    expect(app(BladeDirectives::class)->isEnabled())->toBeFalse();
});

it('returns null from endSpaceless when disabled', function (): void {
    config()->set('spaceless.enabled', false);

    expect(app(BladeDirectives::class)->endSpaceless())->toBeNull();
});
