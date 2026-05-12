<?php

use function Spatie\Piper\Arr\select;

it('selects the requested keys from each item', function () {
    expect([
        ['id' => 1, 'name' => 'Taylor', 'team' => 'core'],
        ['id' => 2, 'name' => 'Abigail', 'team' => 'core'],
    ] |> select(['id', 'name']))->toBe([
        ['id' => 1, 'name' => 'Taylor'],
        ['id' => 2, 'name' => 'Abigail'],
    ]);
});
