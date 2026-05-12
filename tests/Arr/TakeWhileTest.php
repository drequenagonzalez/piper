<?php

use function Spatie\Piper\Arr\takeWhile;

it('takes values while a callback returns true', function () {
    expect([1, 2, 3, 4] |> takeWhile(fn (int $value): bool => $value < 3))->toBe([1, 2]);
});
