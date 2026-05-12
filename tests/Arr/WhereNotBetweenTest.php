<?php

use function Spatie\Piper\Arr\whereNotBetween;

it('filters items with values outside a range', function () {
    expect([
        ['name' => 'Taylor', 'score' => 98],
        ['name' => 'Jess', 'score' => 91],
    ] |> whereNotBetween('score', [92, 98]))->toBe([
        1 => ['name' => 'Jess', 'score' => 91],
    ]);
});
