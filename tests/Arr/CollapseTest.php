<?php

use function Spatie\Piper\Arr\collapse;

it('collapses nested arrays into one array', function () {
    expect([[1, 2], [3, 4]] |> collapse())->toBe([1, 2, 3, 4]);
});
