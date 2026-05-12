<?php

use function Spatie\Piper\Arr\last;

it('returns the last value', function () {
    expect(['first' => 'Taylor', 'second' => 'Abigail'] |> last())->toBe('Abigail');
});

it('returns the last value matching a callback', function () {
    expect([1, 2, 3] |> last(fn (int $value): bool => $value < 3))->toBe(2);
});
