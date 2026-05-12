<?php

use function Spatie\Piper\Str\wrap;

it('wraps a string with surrounding strings', function () {
    expect('value' |> wrap('"'))->toBe('"value"');
});
