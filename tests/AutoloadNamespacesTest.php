<?php

use Spatie\Piper\Exceptions\ItemNotFoundException;
use Spatie\Piper\Exceptions\MultipleItemsFoundException;

use function Spatie\Piper\Arr\map;
use function Spatie\Piper\Support\normalize;

it('autoloads array support functions and exceptions from their new namespaces', function () {
    expect([1, 2, 3] |> map(fn (int $value): int => $value * 2))->toBe([2, 4, 6]);
    expect(normalize(null))->toBe([]);

    expect(ItemNotFoundException::class)->toBe('Spatie\\Piper\\Exceptions\\ItemNotFoundException');
    expect(MultipleItemsFoundException::class)->toBe('Spatie\\Piper\\Exceptions\\MultipleItemsFoundException');
});
