<?php

use function Spatie\Piper\Arr\eachSpread;

it('spreads nested item values into the callback and returns the original array', function () {
    $visited = [];
    $items = [[1, 2], [3, 4]];

    expect($items |> eachSpread(function (int $a, int $b, int $key) use (&$visited): void {
        $visited[] = [$a + $b, $key];
    }))->toBe($items);

    expect($visited)->toBe([[3, 0], [7, 1]]);
});
