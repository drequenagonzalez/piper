<?php

use function Spatie\Piper\Arr\reverse;

it('reverses values while preserving keys', function () {
    expect([1, 2, 3] |> reverse())->toBe([2 => 3, 1 => 2, 0 => 1]);
});
