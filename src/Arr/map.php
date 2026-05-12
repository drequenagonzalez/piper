<?php

namespace Spatie\Piper\Arr;

use Closure;

function map(callable $callback): Closure
{
    return function (array $items) use ($callback): array {
        $result = [];

        foreach ($items as $key => $value) {
            $result[$key] = $callback($value, $key);
        }

        return $result;
    };
}
