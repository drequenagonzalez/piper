<?php

use function Spatie\Piper\Arr\put;

it('returns a copy with a key set', function () {
    $items = ['a' => 1, 'b' => 2];

    expect($items |> put('c', 3))->toBe(['a' => 1, 'b' => 2, 'c' => 3]);
    expect($items)->toBe(['a' => 1, 'b' => 2]);
});
