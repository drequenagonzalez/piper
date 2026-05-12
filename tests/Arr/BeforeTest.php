<?php

use function Spatie\Piper\Arr\before;

it('returns the value before a matching item', function () {
    expect(['a' => 1, 'b' => 2, 'c' => 3] |> before(2))->toBe(1);
});

it('can search strictly', function () {
    expect([1, '2'] |> before(2, strict: true))->toBeNull();
    expect([1, '2'] |> before('2', strict: true))->toBe(1);
});
