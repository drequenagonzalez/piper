<?php

use function Spatie\Piper\Arr\ensure;

it('returns the array when all items match the expected type', function () {
    expect([1, 2, 3] |> ensure('int'))->toBe([1, 2, 3]);
});

it('throws when an item does not match the expected type', function () {
    expect(fn () => [1, '2'] |> ensure('int'))->toThrow(UnexpectedValueException::class);
});
