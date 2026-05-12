<?php

use Spatie\Piper\Exceptions\ItemNotFound;
use Spatie\Piper\Exceptions\MultipleItemsFound;

use function Spatie\Piper\Arr\map;
use function Spatie\Piper\Support\normalize;

it('autoloads array support functions and exceptions from their new namespaces', function () {
    expect([1, 2, 3] |> map(fn (int $value): int => $value * 2))->toBe([2, 4, 6]);
    expect(normalize(null))->toBe([]);

    expect(ItemNotFound::class)->toBe('Spatie\\Piper\\Exceptions\\ItemNotFound');
    expect(MultipleItemsFound::class)->toBe('Spatie\\Piper\\Exceptions\\MultipleItemsFound');
});

it('does not expose passthrough helpers that are useless in pipelines', function () {
    expect(function_exists('Spatie\\Piper\\Arr\\all'))->toBeFalse();
    expect(function_exists('Spatie\\Piper\\Str\\value'))->toBeFalse();
});
