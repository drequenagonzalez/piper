<?php

use function Spatie\Piper\Arr\hasMany;

it('checks whether many values exist', function () {
    expect([1, 2, 3, 4] |> hasMany())->toBeTrue();
    expect([1] |> hasMany())->toBeFalse();
});

it('checks whether many values match a callback', function () {
    expect([1, 2, 3, 4] |> hasMany(fn (int $value): bool => $value > 2))->toBeTrue();
});
