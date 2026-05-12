<?php

use function Spatie\Piper\Str\afterLast;

it('returns the remainder after the last occurrence of a value', function () {
    expect('App\\Models\\User' |> afterLast('\\'))->toBe('User');
});
