<?php

use function Spatie\Piper\Arr\unless;

it('runs the callback when the condition is false', function () {
    expect([1] |> unless(false, fn (array $items): array => [...$items, 2]))->toBe([1, 2]);
});
