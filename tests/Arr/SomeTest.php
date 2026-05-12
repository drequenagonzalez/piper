<?php

use function Spatie\Piper\Arr\some;

it('checks whether some value passes a callback', function () {
    expect([1, 2, 3, 4] |> some(fn (int $value): bool => $value === 3))->toBeTrue();
    expect([1, 2, 3, 4] |> some(fn (int $value): bool => $value === 9))->toBeFalse();
});
