<?php

use function Spatie\Piper\Arr\range;

it('creates a range directly', function () {
    expect(range(1, 3))->toBe([1, 2, 3]);
});
