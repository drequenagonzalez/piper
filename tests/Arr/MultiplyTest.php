<?php

use function Spatie\Piper\Arr\multiply;

it('duplicates the array a number of times', function () {
    expect([1, 2] |> multiply(2))->toBe([1, 2, 1, 2]);
});
