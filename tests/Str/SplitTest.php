<?php

use function Spatie\Piper\Str\split;

it('splits a string by regex pattern', function () {
    expect('a b  c' |> split('/\s+/'))->toBe(['a', 'b', 'c']);
});
