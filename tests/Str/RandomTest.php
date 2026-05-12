<?php

use function Spatie\Piper\Str\random;

it('creates random strings directly', function () {
    expect(strlen(random(12)))->toBe(12);
});
