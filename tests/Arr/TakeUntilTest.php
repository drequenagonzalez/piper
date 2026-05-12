<?php

use function Spatie\Piper\Arr\takeUntil;

it('takes values until a value is found', function () {
    expect([1, 2, 3, 4] |> takeUntil(3))->toBe([1, 2]);
});
