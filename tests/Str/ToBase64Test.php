<?php

use function Spatie\Piper\Str\toBase64;

it('encodes a string as base64', function () {
    expect('Laravel' |> toBase64())->toBe(base64_encode('Laravel'));
});
