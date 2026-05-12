<?php

use function Spatie\Piper\Arr\chunk;

it('chunks values into groups', function () {
    expect([1, 2, 3, 4, 5] |> chunk(2))->toBe([[1, 2], [3, 4], [5]]);
});

it('can preserve keys', function () {
    expect(['a' => 1, 'b' => 2, 'c' => 3] |> chunk(2, preserveKeys: true))->toBe([
        ['a' => 1, 'b' => 2],
        ['c' => 3],
    ]);
});
