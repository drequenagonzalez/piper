<?php

use function Spatie\Piper\Arr\transform;

it('returns transformed values without mutating the input array', function () {
    $items = [1, 2];

    expect($items |> transform(fn (int $value): int => $value * 10))->toBe([10, 20]);
    expect($items)->toBe([1, 2]);
});
