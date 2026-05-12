<?php

use function Spatie\Piper\Arr\times;

it('creates values a number of times directly', function () {
    expect(times(3, fn (int $number): int => $number * 2))->toBe([2, 4, 6]);
});
