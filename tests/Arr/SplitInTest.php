<?php

use function Spatie\Piper\Arr\splitIn;

it('splits values into groups without empty trailing groups', function () {
    expect([1, 2, 3, 4, 5] |> splitIn(2))->toBe([[1, 2, 3], [4, 5]]);
});
