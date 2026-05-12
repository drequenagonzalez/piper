<?php

use Spatie\Piper\Exceptions\ItemNotFound;
use Spatie\Piper\Exceptions\MultipleItemsFound;

use function Spatie\Piper\Arr\sole;

it('returns the only value', function () {
    expect(['Taylor'] |> sole())->toBe('Taylor');
});

it('throws when there is no only value', function () {
    expect(fn () => [] |> sole())->toThrow(ItemNotFound::class);
    expect(fn () => [1, 2] |> sole())->toThrow(MultipleItemsFound::class);
});
