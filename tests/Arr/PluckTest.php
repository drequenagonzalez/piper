<?php

use function Spatie\Piper\Arr\pluck;

it('plucks values using dot notation and optional keys', function () {
    expect([
        ['user' => ['id' => 1, 'name' => 'Taylor']],
        ['user' => ['id' => 2, 'name' => 'Abigail']],
    ] |> pluck('user.name', 'user.id'))->toBe([
        1 => 'Taylor',
        2 => 'Abigail',
    ]);
});
