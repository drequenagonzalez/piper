<?php

use function Spatie\Piper\Arr\whereNotIn;

it('filters items with values not in a list', function () {
    expect([
        ['name' => 'Taylor', 'score' => 98],
        ['name' => 'Jess', 'score' => 91],
    ] |> whereNotIn('name', ['Jess']))->toBe([
        0 => ['name' => 'Taylor', 'score' => 98],
    ]);
});
