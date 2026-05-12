<?php

use function Spatie\Piper\Arr\reduceSpread;

it('reduces values into multiple carried values', function () {
    [$sum, $count] = [1, 2, 3]
        |> reduceSpread(fn (int $sum, int $count, int $value): array => [$sum + $value, $count + 1], 0, 0);

    expect([$sum, $count])->toBe([6, 3]);
});
