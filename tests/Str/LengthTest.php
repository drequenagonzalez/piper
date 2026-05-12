<?php

use function Spatie\Piper\Str\length;

it('returns the string length', function () {
    expect('Laravel' |> length())->toBe(7);
});
