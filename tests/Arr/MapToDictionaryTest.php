<?php

use function Spatie\Piper\Arr\mapToDictionary;

it('maps items to dictionary groups', function () {
    expect([
        ['name' => 'Taylor', 'department' => 'Engineering'],
        ['name' => 'Abigail', 'department' => 'Engineering'],
        ['name' => 'Jess', 'department' => 'Docs'],
    ] |> mapToDictionary(fn (array $item): array => [$item['department'] => $item['name']]))->toBe([
        'Engineering' => ['Taylor', 'Abigail'],
        'Docs' => ['Jess'],
    ]);
});
