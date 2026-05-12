<?php

use function Spatie\Piper\Arr\mapWithKeys;

it('maps values to new keys', function () {
    expect([
        ['name' => 'Taylor', 'department' => 'Engineering'],
        ['name' => 'Jess', 'department' => 'Docs'],
    ] |> mapWithKeys(fn (array $item): array => [$item['name'] => $item['department']]))->toBe([
        'Taylor' => 'Engineering',
        'Jess' => 'Docs',
    ]);
});
