<?php

namespace Spatie\Piper;

use Closure;

function put(mixed $key, mixed $value): Closure
{
    return function (array $items) use ($key, $value): array {
        if ($key === null) {
            $items[] = $value;
        } else {
            $items[$key] = $value;
        }

        return $items;
    };
}
