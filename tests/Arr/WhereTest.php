<?php

use function Spatie\Piper\Arr\where;

it('filters items with a where clause', function () {
    expect([
        ['name' => 'Taylor', 'team' => 'core'],
        ['name' => 'Jess', 'team' => null],
        ['name' => 'Abigail', 'team' => 'core'],
    ] |> where('team', 'core'))->toBe([
        0 => ['name' => 'Taylor', 'team' => 'core'],
        2 => ['name' => 'Abigail', 'team' => 'core'],
    ]);
});
