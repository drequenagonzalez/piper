<?php

use function Spatie\Piper\Arr\skipWhile;

it('skips values while the given value matches', function () {
    expect([1, 1, 2, 3] |> skipWhile(1))->toBe([2 => 2, 3 => 3]);
});

it('skips values while a callback returns true', function () {
    expect([1, 2, 3, 4] |> skipWhile(fn (int $value): bool => $value < 3))->toBe([2 => 3, 3 => 4]);
});
