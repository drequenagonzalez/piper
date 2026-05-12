<?php

use function Spatie\Piper\Str\padRight;

it('right pads a string', function () {
    expect('Laravel' |> padRight(10, '-'))->toBe('Laravel---');
});
