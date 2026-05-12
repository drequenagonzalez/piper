<?php

use function Spatie\Piper\Arr\reject;

it('rejects values matching a callback', function () {
    expect([1, 2, 3, 4] |> reject(fn (int $value): bool => $value > 2))->toBe([0 => 1, 1 => 2]);
});
