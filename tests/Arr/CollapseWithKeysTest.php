<?php

use function Spatie\Piper\Arr\collapseWithKeys;

it('collapses nested arrays while preserving string keys', function () {
    expect([['a' => 1], ['b' => 2]] |> collapseWithKeys())->toBe(['a' => 1, 'b' => 2]);
});
