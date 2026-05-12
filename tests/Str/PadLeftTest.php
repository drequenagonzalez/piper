<?php

use function Spatie\Piper\Str\padLeft;

it('left pads a string', function () {
    expect('Laravel' |> padLeft(10, '-'))->toBe('---Laravel');
});
