<?php

use function Spatie\Piper\Str\trim;

it('trims both sides of a string', function () {
    expect(' laravel ' |> trim())->toBe('laravel');
    expect('/laravel/' |> trim('/'))->toBe('laravel');
});
