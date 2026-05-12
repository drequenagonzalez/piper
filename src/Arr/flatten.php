<?php

namespace Spatie\Piper\Arr;

use Closure;

function flatten(float|int $depth = INF): Closure
{
    return function (array $items) use ($depth): array {
        $result = [];

        foreach ($items as $item) {
            if (! is_array($item)) {
                $result[] = $item;
            } elseif ($depth === 1) {
                array_push($result, ...array_values($item));
            } else {
                array_push($result, ...($item |> flatten($depth - 1)));
            }
        }

        return $result;
    };
}
