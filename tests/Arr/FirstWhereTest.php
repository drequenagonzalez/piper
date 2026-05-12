<?php

use function Spatie\Piper\Arr\firstWhere;

it('returns the first item matching a where clause', function () {
    expect([
        ['name' => 'Taylor', 'score' => 98],
        ['name' => 'Jess', 'score' => 91],
    ] |> firstWhere('score', '>', 95))->toBe(['name' => 'Taylor', 'score' => 98]);
});
