<?php

use function Spatie\Piper\Arr\get;

it('gets a value by key', function () {
    expect(['name' => 'Taylor'] |> get('name'))->toBe('Taylor');
});

it('returns a default for missing keys', function () {
    expect(['name' => 'Taylor'] |> get('missing', 'fallback'))->toBe('fallback');
});
