<?php

use function Spatie\Piper\Str\squish;

it('removes extra whitespace from a string', function () {
    expect("  laravel\tphp   framework  " |> squish())->toBe('laravel php framework');
});
