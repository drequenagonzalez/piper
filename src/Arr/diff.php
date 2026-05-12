<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\normalize;

function diff(mixed $other): Closure
{
    return function (array $items) use ($other): array {
        return array_diff($items, normalize($other));
    };
}
