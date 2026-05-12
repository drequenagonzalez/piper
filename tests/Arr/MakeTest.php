<?php

use function Spatie\Piper\Arr\make;

it('creates arrays from values directly', function () {
    expect(make(null))->toBe([]);
    expect(make('Taylor'))->toBe(['Taylor']);
});
