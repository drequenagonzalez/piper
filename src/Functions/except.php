<?php

namespace Spatie\Piper;

use Closure;

function except(mixed $keys): Closure
{
    return function (array $items) use ($keys): array {
        foreach (Support::normalize($keys) as $key) {
            unset($items[$key]);
        }

        return $items;
    };
}
