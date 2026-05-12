<?php

use function Spatie\Piper\Str\before;

it('returns the string before the first occurrence of a value', function () {
    expect('This is my name' |> before('my name'))->toBe('This is ');
});

it('returns the original string when the search value is missing or empty', function () {
    expect('This is my name' |> before('missing'))->toBe('This is my name');
    expect('This is my name' |> before(''))->toBe('This is my name');
});
