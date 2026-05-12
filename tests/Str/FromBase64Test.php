<?php

use function Spatie\Piper\Str\fromBase64;

it('decodes base64 strings', function () {
    expect(base64_encode('Laravel') |> fromBase64())->toBe('Laravel');
});

it('supports strict decoding', function () {
    expect('@@@' |> fromBase64(strict: true))->toBeFalse();
});
