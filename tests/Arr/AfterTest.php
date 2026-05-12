<?php

use function Spatie\Piper\Arr\after;

it('returns the value after a matching item', function () {
    expect(['a' => 1, 'b' => 2, 'c' => 3] |> after(2))->toBe(3);
});

it('can search strictly', function () {
    expect(['1', 2] |> after(1, strict: true))->toBeNull();
    expect(['1', 2] |> after('1', strict: true))->toBe(2);
});
