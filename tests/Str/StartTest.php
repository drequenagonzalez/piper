<?php

use function Spatie\Piper\Str\start;

it('adds a prefix when missing', function () {
    expect('this/string' |> start('/'))->toBe('/this/string');
    expect('/this/string' |> start('/'))->toBe('/this/string');
});
