<?php

use function Spatie\Piper\Arr\tap;

it('runs a callback with the array and returns the original array', function () {
    $seen = null;
    $items = [1, 2];

    expect($items |> tap(function (array $items) use (&$seen): void {
        $seen = $items;
    }))->toBe($items);

    expect($seen)->toBe($items);
});
