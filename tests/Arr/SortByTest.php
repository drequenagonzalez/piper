<?php

use function Spatie\Piper\Arr\sortBy;

it('sorts values by a key', function () {
    expect([
        ['name' => 'Taylor', 'score' => 98],
        ['name' => 'Jess', 'score' => 91],
    ] |> sortBy('score'))->toBe([
        1 => ['name' => 'Jess', 'score' => 91],
        0 => ['name' => 'Taylor', 'score' => 98],
    ]);
});
