<?php

use function Spatie\Piper\Arr\whereBetween;

it('filters items with values between a range', function () {
    expect([
        ['name' => 'Taylor', 'score' => 98],
        ['name' => 'Jess', 'score' => 91],
    ] |> whereBetween('score', [92, 98]))->toBe([
        0 => ['name' => 'Taylor', 'score' => 98],
    ]);
});
