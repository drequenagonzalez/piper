<?php

namespace Spatie\Piper;

use Closure;

function push(mixed ...$values): Closure
{
    return function (array $items) use ($values): array {
        foreach ($values as $value) {
            $items[] = $value;
        }

        return $items;
    };
}
