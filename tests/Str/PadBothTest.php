<?php

use function Spatie\Piper\Str\padBoth;

it('pads both sides of a string', function () {
    expect('Laravel' |> padBoth(11, '-'))->toBe('--Laravel--');
});
