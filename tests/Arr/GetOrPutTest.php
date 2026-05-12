<?php

use function Spatie\Piper\Arr\getOrPut;

it('returns an existing value for a key', function () {
    expect(['name' => 'Taylor'] |> getOrPut('name', 'Abigail'))->toBe('Taylor');
});

it('evaluates and returns a fallback value for a missing key', function () {
    expect([] |> getOrPut('name', fn (): string => 'Taylor'))->toBe('Taylor');
});
