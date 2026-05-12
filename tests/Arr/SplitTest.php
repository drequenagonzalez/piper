<?php

use function Spatie\Piper\Arr\split;

it('splits values into the requested number of groups', function () {
    expect([1, 2, 3, 4, 5] |> split(2))->toBe([[1, 2, 3], [4, 5]]);
});
