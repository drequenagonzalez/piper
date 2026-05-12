<?php

use function Spatie\Piper\Str\after;

it('returns the remainder after the first occurrence of a value', function () {
    expect('This is my name' |> after('This is'))->toBe(' my name');
    expect('App\\Models\\User' |> after('\\'))->toBe('Models\\User');
});

it('returns the original string when the search value is missing or empty', function () {
    expect('This is my name' |> after('missing'))->toBe('This is my name');
    expect('This is my name' |> after(''))->toBe('This is my name');
});
