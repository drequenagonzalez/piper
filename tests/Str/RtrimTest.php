<?php

use function Spatie\Piper\Str\rtrim;

it('trims the right side of a string', function () {
    expect('Laravel  ' |> rtrim())->toBe('Laravel');
});
