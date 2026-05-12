<?php

use function Spatie\Piper\Arr\splice;

it('extracts a slice from the array', function () {
    expect([1, 2, 3, 4] |> splice(1, 2))->toBe([2, 3]);
});
