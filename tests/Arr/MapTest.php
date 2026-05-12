<?php

use function Spatie\Piper\Arr\map;

it('maps every item with its key', function () {
    expect([1, 2, 3] |> map(fn (int $value, int $key): int => $value * ($key + 1)))->toBe([1, 4, 9]);
});
