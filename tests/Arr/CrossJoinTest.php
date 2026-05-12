<?php

use function Spatie\Piper\Arr\crossJoin;

it('creates a cartesian product', function () {
    expect([1, 2] |> crossJoin(['a', 'b']))->toBe([[1, 'a'], [1, 'b'], [2, 'a'], [2, 'b']]);
});
