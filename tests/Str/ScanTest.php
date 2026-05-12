<?php

use function Spatie\Piper\Str\scan;

it('scans a string with a format', function () {
    expect('filename.jpg' |> scan('%[^.].%s'))->toBe(['filename', 'jpg']);
});
