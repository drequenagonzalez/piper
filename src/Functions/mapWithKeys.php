<?php

namespace Spatie\Piper;

use Closure;

function mapWithKeys(callable $callback): Closure
{
    return function (array $items) use ($callback): array {
        $result = [];

        foreach ($items as $key => $item) {
            foreach ($callback($item, $key) as $mapKey => $mapValue) {
                $result[$mapKey] = $mapValue;
            }
        }

        return $result;
    };
}
