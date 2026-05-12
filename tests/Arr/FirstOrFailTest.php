<?php

use Spatie\Piper\Exceptions\ItemNotFound;

use function Spatie\Piper\Arr\firstOrFail;

it('returns the first value', function () {
    expect(['Taylor', 'Abigail'] |> firstOrFail())->toBe('Taylor');
});

it('throws when no value exists', function () {
    expect(fn () => [] |> firstOrFail())->toThrow(ItemNotFound::class);
});
