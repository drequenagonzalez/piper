<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\normalize;

function diffUsing(mixed $other, callable $callback): Closure
{
    return function (array $items) use ($other, $callback): array {
        return array_udiff($items, normalize($other), $callback);
    };
}
