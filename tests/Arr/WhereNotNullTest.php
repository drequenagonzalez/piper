<?php

use function Spatie\Piper\Arr\whereNotNull;

it('filters items where a key is not null', function () {
    expect([
        ['name' => 'Taylor', 'team' => 'core'],
        ['name' => 'Jess', 'team' => null],
    ] |> whereNotNull('team'))->toBe([
        0 => ['name' => 'Taylor', 'team' => 'core'],
    ]);
});
