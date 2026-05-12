<?php

use function Spatie\Piper\Arr\forget;

it('returns an array without the requested keys', function () {
    $items = ['a' => 1, 'b' => 2];

    expect($items |> forget('a'))->toBe(['b' => 2]);
    expect($items)->toBe(['a' => 1, 'b' => 2]);
});
