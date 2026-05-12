<?php

use function Spatie\Piper\Arr\whereNotInStrict;

it('filters items with strict values not in a list', function () {
    expect([
        ['id' => 1],
        ['id' => '1'],
    ] |> whereNotInStrict('id', [1]))->toBe([
        1 => ['id' => '1'],
    ]);
});
