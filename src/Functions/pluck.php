<?php

namespace Spatie\Piper;

use Closure;

function pluck(callable|string|int|array|null $value, callable|string|int|array|null $key = null): Closure
{
    return function (array $items) use ($value, $key): array {
        $results = [];

        foreach ($items as $item) {
            $itemValue = Support::useAsCallable($value) ? $value($item) : Support::dataGet($item, $value);

            if ($key === null) {
                $results[] = $itemValue;
            } else {
                $itemKey = Support::useAsCallable($key) ? $key($item) : Support::dataGet($item, $key);
                $results[Support::enumValue($itemKey)] = $itemValue;
            }
        }

        return $results;
    };
}
