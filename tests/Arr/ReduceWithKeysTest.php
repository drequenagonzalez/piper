<?php

use function Spatie\Piper\Arr\reduceWithKeys;

it('reduces values with their keys', function () {
    expect(['a' => 1, 'b' => 2] |> reduceWithKeys(
        fn (string $carry, int $value, string $key): string => $carry.$key.$value,
        '',
    ))->toBe('a1b2');
});
