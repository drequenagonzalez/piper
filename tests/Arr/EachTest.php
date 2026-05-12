<?php

use function Spatie\Piper\Arr\each;

it('runs a callback for each item and returns the original array', function () {
    $visited = [];
    $items = ['a' => 1, 'b' => 2];

    expect($items |> each(function (int $value, string $key) use (&$visited): void {
        $visited[$key] = $value;
    }))->toBe($items);

    expect($visited)->toBe($items);
});

it('stops iterating when the callback returns false', function () {
    $visited = [];

    [1, 2, 3] |> each(function (int $value) use (&$visited): bool {
        $visited[] = $value;

        return $value < 2;
    });

    expect($visited)->toBe([1, 2]);
});
