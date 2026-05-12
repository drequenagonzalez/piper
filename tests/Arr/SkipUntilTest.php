<?php

use function Spatie\Piper\Arr\skipUntil;

it('skips values until the given value is found', function () {
    expect([1, 2, 3, 4] |> skipUntil(3))->toBe([2 => 3, 3 => 4]);
});

it('skips values until a callback returns true', function () {
    expect([1, 2, 3, 4] |> skipUntil(fn (int $value): bool => $value > 2))->toBe([2 => 3, 3 => 4]);
});
