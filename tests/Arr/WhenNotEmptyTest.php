<?php

use function Spatie\Piper\Arr\whenNotEmpty;

it('runs the callback when the array is not empty', function () {
    expect([1] |> whenNotEmpty(fn (array $items): array => [...$items, 2]))->toBe([1, 2]);
});
