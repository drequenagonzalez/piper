<?php

use function Spatie\Piper\Arr\prepend;

it('returns a copy with a value prepended', function () {
    $items = ['a' => 1, 'b' => 2];

    expect($items |> prepend(0))->toBe([0, 'a' => 1, 'b' => 2]);
    expect($items)->toBe(['a' => 1, 'b' => 2]);
});
