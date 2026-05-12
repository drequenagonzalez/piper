<?php

use function Spatie\Piper\Arr\sort;

it('sorts values ascending while preserving keys', function () {
    expect([3, 1, 2] |> sort())->toBe([1 => 1, 2 => 2, 0 => 3]);
});
