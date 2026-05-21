<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Expelled Tags
    |--------------------------------------------------------------------------
    |
    | Whitespace inside these HTML tags will be preserved when the @spaceless
    | directive collapses the surrounding markup. Add any tags whose
    | inner content is whitespace-sensitive (e.g. <pre>, <code>, ...).
    |
    */

    'expelled_tags' => [
        'textarea',
        'script',
        'pre',
        'style',
    ],

    /*
    |--------------------------------------------------------------------------
    | Enabled
    |--------------------------------------------------------------------------
    |
    | When disabled, the @spaceless directive becomes a no-op and the
    | original markup (including all whitespace) is rendered as is.
    | Useful for debugging compiled views in local environments.
    |
    */

    'enabled' => env('SPACELESS_ENABLED', true),

];
