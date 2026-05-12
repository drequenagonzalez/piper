<?php

use function Spatie\Piper\Str\ltrim;

it('trims the left side of a string', function () {
    expect('  Laravel' |> ltrim())->toBe('Laravel');
});
