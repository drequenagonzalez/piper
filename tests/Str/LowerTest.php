<?php

use function Spatie\Piper\Str\lower;

it('lowercases a string', function () {
    expect('LARAVEL' |> lower())->toBe('laravel');
});
