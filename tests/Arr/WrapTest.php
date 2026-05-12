<?php

use function Spatie\Piper\Arr\wrap;

it('wraps values in an array directly', function () {
    expect(wrap('Taylor'))->toBe(['Taylor']);
});
