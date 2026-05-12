<?php

use function Spatie\Piper\Arr\concat;

it('appends another iterable values to the array', function () {
    expect([1, 2] |> concat([3, 4]))->toBe([1, 2, 3, 4]);
});
