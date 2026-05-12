<?php

use function Spatie\Piper\Arr\groupBy;

it('groups items by a key', function () {
    expect([
        ['name' => 'Taylor', 'team' => 'core'],
        ['name' => 'Abigail', 'team' => 'core'],
        ['name' => 'Jess', 'team' => 'docs'],
    ] |> groupBy('team'))->toBe([
        'core' => [
            ['name' => 'Taylor', 'team' => 'core'],
            ['name' => 'Abigail', 'team' => 'core'],
        ],
        'docs' => [
            ['name' => 'Jess', 'team' => 'docs'],
        ],
    ]);
});
