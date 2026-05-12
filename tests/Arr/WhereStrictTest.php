<?php

use function Spatie\Piper\Arr\whereStrict;

it('filters items with strict comparison', function () {
    expect([
        ['id' => 1],
        ['id' => '1'],
    ] |> whereStrict('id', 1))->toBe([
        ['id' => 1],
    ]);
});
