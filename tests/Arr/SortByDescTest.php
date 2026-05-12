<?php

use function Spatie\Piper\Arr\sortByDesc;

it('sorts values by a key descending', function () {
    expect([
        ['name' => 'Taylor', 'score' => 98],
        ['name' => 'Jess', 'score' => 91],
    ] |> sortByDesc('score'))->toBe([
        0 => ['name' => 'Taylor', 'score' => 98],
        1 => ['name' => 'Jess', 'score' => 91],
    ]);
});
