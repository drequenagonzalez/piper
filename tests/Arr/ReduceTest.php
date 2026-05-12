<?php

use function Spatie\Piper\Arr\reduce;

it('reduces values to one result', function () {
    expect([1, 2, 3] |> reduce(fn (int $carry, int $value): int => $carry + $value, 0))->toBe(6);
});
