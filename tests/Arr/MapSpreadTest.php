<?php

use function Spatie\Piper\Arr\mapSpread;

it('spreads nested values into the callback', function () {
    expect([[1, 2], [3, 4]] |> mapSpread(fn (int $a, int $b): int => $a + $b))->toBe([3, 7]);
});
