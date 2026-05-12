<?php

use function Spatie\Piper\Arr\every;

it('checks whether every item passes a callback', function () {
    expect([1, 2, 3, 4] |> every(fn (int $value): bool => $value > 0))->toBeTrue();
    expect([1, 2, 3, 4] |> every(fn (int $value): bool => $value > 2))->toBeFalse();
});
