<?php

use function Spatie\Piper\Arr\mapToGroups;

it('maps items to grouped values', function () {
    expect([
        ['name' => 'Taylor', 'department' => 'Engineering'],
        ['name' => 'Abigail', 'department' => 'Engineering'],
        ['name' => 'Jess', 'department' => 'Docs'],
    ] |> mapToGroups(fn (array $item): array => [$item['department'] => $item['name']]))->toBe([
        'Engineering' => ['Taylor', 'Abigail'],
        'Docs' => ['Jess'],
    ]);
});
