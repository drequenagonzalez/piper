<?php

use function Spatie\Piper\Arr\implode;

it('implodes scalar values', function () {
    expect(['a', 'b', 'c'] |> implode('-'))->toBe('a-b-c');
});

it('implodes values plucked by key', function () {
    expect([
        ['name' => 'Taylor'],
        ['name' => 'Abigail'],
    ] |> implode('name', ', '))->toBe('Taylor, Abigail');
});
