<?php

namespace Spatie\Piper\Arr;

use Closure;

function dot(string $prepend = ''): Closure
{
    return function (array $items) use ($prepend): array {
        $results = [];

        foreach ($items as $key => $value) {
            if (is_array($value) && $value !== []) {
                $results = array_merge($results, ($value |> dot($prepend.$key.'.')));
            } else {
                $results[$prepend.$key] = $value;
            }
        }

        return $results;
    };
}
