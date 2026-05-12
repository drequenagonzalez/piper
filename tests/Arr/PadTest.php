<?php

use function Spatie\Piper\Arr\pad;

it('pads the array to the given size', function () {
    expect([1, 2] |> pad(4, 0))->toBe([1, 2, 0, 0]);
});
