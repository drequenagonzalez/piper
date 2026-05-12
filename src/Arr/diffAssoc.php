<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\normalize;

function diffAssoc(mixed $other): Closure
{
    return function (array $items) use ($other): array {
        return array_diff_assoc($items, normalize($other));
    };
}
