<?php

use function Spatie\Piper\Arr\first;

it('returns the first value', function () {
    expect(['first' => 'Taylor', 'second' => 'Abigail'] |> first())->toBe('Taylor');
});

it('returns the first value matching a callback', function () {
    expect([1, 2, 3] |> first(fn (int $value): bool => $value > 1))->toBe(2);
});
