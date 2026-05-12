<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\normalize;

function diffKeys(mixed $other): Closure
{
    return function (array $items) use ($other): array {
        return array_diff_key($items, normalize($other));
    };
}
