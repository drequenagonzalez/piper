<?php

use function Spatie\Piper\Str\toString;

it('returns the string value', function () {
    expect('Laravel' |> toString())->toBe('Laravel');
});
