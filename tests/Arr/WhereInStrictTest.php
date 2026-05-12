<?php

use function Spatie\Piper\Arr\whereInStrict;

it('filters items with strict values in a list', function () {
    expect([
        ['id' => 1],
        ['id' => '1'],
    ] |> whereInStrict('id', [1]))->toBe([
        ['id' => 1],
    ]);
});
