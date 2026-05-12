<?php

use function Spatie\Piper\Str\beforeLast;

it('returns the string before the last occurrence of a value', function () {
    expect('App\\Models\\User' |> beforeLast('\\'))->toBe('App\\Models');
});
