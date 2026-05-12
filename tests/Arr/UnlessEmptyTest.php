<?php

use function Spatie\Piper\Arr\unlessEmpty;

it('runs the callback when the array is not empty', function () {
    expect([1] |> unlessEmpty(fn (array $items): array => [...$items, 2]))->toBe([1, 2]);
});
