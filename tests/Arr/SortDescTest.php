<?php

use function Spatie\Piper\Arr\sortDesc;

it('sorts values descending while preserving keys', function () {
    expect([3, 1, 2] |> sortDesc())->toBe([0 => 3, 2 => 2, 1 => 1]);
});
