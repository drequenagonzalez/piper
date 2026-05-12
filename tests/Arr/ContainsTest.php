<?php

use function Spatie\Piper\Arr\contains;

it('checks whether the array contains a loose value', function () {
    expect(['name' => 'Taylor', 'age' => 40] |> contains('40'))->toBeTrue();
});

it('checks whether the array contains a callback match', function () {
    expect([1, 2, 3] |> contains(fn (int $value): bool => $value > 2))->toBeTrue();
});
