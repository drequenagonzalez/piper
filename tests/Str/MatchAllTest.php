<?php

use function Spatie\Piper\Str\matchAll;

it('returns all regex matches', function () {
    expect('abc123def456' |> matchAll('/\d+/'))->toBe(['123', '456']);
});
