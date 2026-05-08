<?php

namespace Spatie\Piper;

use Closure;

function combine(mixed $values): Closure
{
    return function (array $items) use ($values): array {
        return array_combine(array_values($items), array_values(Support::normalize($values)));
    };
}
