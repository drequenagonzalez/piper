<?php

use function Spatie\Piper\Arr\unwrap;

it('returns the given value directly', function () {
    expect(unwrap(['Taylor']))->toBe(['Taylor']);
});
