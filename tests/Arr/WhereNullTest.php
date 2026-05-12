<?php

use function Spatie\Piper\Arr\whereNull;

it('filters items where a key is null', function () {
    expect([
        ['name' => 'Taylor', 'team' => 'core'],
        ['name' => 'Jess', 'team' => null],
    ] |> whereNull('team'))->toBe([
        1 => ['name' => 'Jess', 'team' => null],
    ]);
});
