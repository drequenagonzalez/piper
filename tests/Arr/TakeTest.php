<?php

use function Spatie\Piper\Arr\take;

it('takes values from the start', function () {
    expect([1, 2, 3, 4] |> take(2))->toBe([1, 2]);
});

it('takes values from the end', function () {
    expect([1, 2, 3, 4] |> take(-2))->toBe([2 => 3, 3 => 4]);
});
