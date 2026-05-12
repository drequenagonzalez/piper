<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\dataGet;
use function Spatie\Piper\Support\enumValue;
use function Spatie\Piper\Support\useAsCallable;

function pluck(callable|string|int|array|null $value, callable|string|int|array|null $key = null): Closure
{
    return function (array $items) use ($value, $key): array {
        $results = [];

        foreach ($items as $item) {
            $itemValue = useAsCallable($value) ? $value($item) : dataGet($item, $value);

            if ($key === null) {
                $results[] = $itemValue;
            } else {
                $itemKey = useAsCallable($key) ? $key($item) : dataGet($item, $key);
                $results[enumValue($itemKey)] = $itemValue;
            }
        }

        return $results;
    };
}
