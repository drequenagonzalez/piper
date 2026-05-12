<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\normalize;

function combine(mixed $values): Closure
{
    return function (array $items) use ($values): array {
        return array_combine(array_values($items), array_values(normalize($values)));
    };
}
