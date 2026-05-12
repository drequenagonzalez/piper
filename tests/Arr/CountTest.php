<?php

use function Spatie\Piper\Arr\count;

it('counts values', function () {
    expect([1, 2, 3, 4] |> count())->toBe(4);
});
