<?php

use function Spatie\Piper\Str\upper;

it('uppercases a string', function () {
    expect('laravel' |> upper())->toBe('LARAVEL');
});
