<?php

use function Spatie\Piper\Arr\skip;

it('skips the requested number of values', function () {
    expect([1, 2, 3, 4] |> skip(2))->toBe([2 => 3, 3 => 4]);
});
