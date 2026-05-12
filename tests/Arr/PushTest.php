<?php

use function Spatie\Piper\Arr\push;

it('returns a copy with values pushed', function () {
    $items = ['a' => 1, 'b' => 2];

    expect($items |> push(3))->toBe(['a' => 1, 'b' => 2, 3]);
    expect($items)->toBe(['a' => 1, 'b' => 2]);
});
