<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\valueRetriever;

function duplicates(callable|string|int|array|null $callback = null, bool $strict = false): Closure
{
    return function (array $items) use ($callback, $strict): array {
        $callback = valueRetriever($callback);
        $seen = [];
        $duplicates = [];

        foreach ($items as $key => $item) {
            $value = $callback($item, $key);

            if (in_array($value, $seen, $strict)) {
                $duplicates[$key] = $value;
            } else {
                $seen[] = $value;
            }
        }

        return $duplicates;
    };
}
