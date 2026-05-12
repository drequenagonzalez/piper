<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\normalize;

function forget(mixed $keys): Closure
{
    return function (array $items) use ($keys): array {
        foreach (normalize($keys) as $key) {
            unset($items[$key]);
        }

        return $items;
    };
}
