<?php

use function Spatie\Piper\Arr\toArray;

it('returns the plain array', function () {
    expect([1, 2] |> toArray())->toBe([1, 2]);
});
