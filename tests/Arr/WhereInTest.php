<?php

use function Spatie\Piper\Arr\whereIn;

it('filters items with values in a list', function () {
    expect([
        ['name' => 'Taylor', 'score' => 98],
        ['name' => 'Jess', 'score' => 91],
    ] |> whereIn('name', ['Jess', 'Taylor']))->toBe([
        ['name' => 'Taylor', 'score' => 98],
        ['name' => 'Jess', 'score' => 91],
    ]);
});
