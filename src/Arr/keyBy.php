<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\enumValue;
use function Spatie\Piper\Support\valueRetriever;

function keyBy(mixed $keyBy): Closure
{
    return function (array $items) use ($keyBy): array {
        $callback = valueRetriever($keyBy);
        $results = [];

        foreach ($items as $key => $item) {
            $resolvedKey = enumValue($callback($item, $key));

            if (is_object($resolvedKey)) {
                $resolvedKey = (string) $resolvedKey;
            }

            $results[$resolvedKey] = $item;
        }

        return $results;
    };
}
