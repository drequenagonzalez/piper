<?php

use function Spatie\Piper\Arr\when;

it('runs the callback when the condition is true', function () {
    expect([1] |> when(true, fn (array $items): array => [...$items, 2]))->toBe([1, 2]);
});
