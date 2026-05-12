<?php

use function Spatie\Piper\Arr\flatMap;

it('maps values and collapses the result one level', function () {
    expect([1, 2, 3] |> flatMap(fn (int $value): array => [$value, $value * 10]))->toBe([1, 10, 2, 20, 3, 30]);
});
