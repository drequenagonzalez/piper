<?php

namespace Spatie\Piper\Arr;

use Closure;

function multiply(int $multiplier): Closure
{
    return function (array $items) use ($multiplier): array {
        $result = [];

        for ($i = 0; $i < $multiplier; $i++) {
            array_push($result, ...array_values($items));
        }

        return $result;
    };
}
