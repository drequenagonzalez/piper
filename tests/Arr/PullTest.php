<?php

use function Spatie\Piper\Arr\pull;

it('extracts a value by key', function () {
    expect(['name' => 'Taylor'] |> pull('name'))->toBe('Taylor');
});

it('returns a default when the key is missing', function () {
    expect(['name' => 'Taylor'] |> pull('missing', 'fallback'))->toBe('fallback');
});
