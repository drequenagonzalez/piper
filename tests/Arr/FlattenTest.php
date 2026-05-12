<?php

use function Spatie\Piper\Arr\flatten;

it('flattens a nested array', function () {
    expect([1, [2, [3]]] |> flatten())->toBe([1, 2, 3]);
});

it('can flatten to a given depth', function () {
    expect([1, [2, [3]]] |> flatten(1))->toBe([1, 2, [3]]);
});
