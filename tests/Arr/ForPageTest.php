<?php

use function Spatie\Piper\Arr\forPage;

it('returns the values for a page', function () {
    expect([1, 2, 3, 4] |> forPage(2, 2))->toBe([2 => 3, 3 => 4]);
});
