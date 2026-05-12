<?php

namespace Spatie\Piper\Arr;

use Closure;
use UnexpectedValueException;

function reduceSpread(callable $callback, mixed ...$initial): Closure
{
    return function (array $items) use ($callback, $initial): array {
        $result = $initial;

        foreach ($items as $key => $value) {
            $result = $callback(...array_merge($result, [$value, $key]));

            if (! is_array($result)) {
                throw new UnexpectedValueException('reduceSpread expects reducer to return an array.');
            }
        }

        return $result;
    };
}
