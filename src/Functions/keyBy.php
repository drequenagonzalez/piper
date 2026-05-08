<?php

namespace Spatie\Piper;

use Closure;

function keyBy(mixed $keyBy): Closure
{
    return function (array $items) use ($keyBy): array {
        $callback = Support::valueRetriever($keyBy);
        $results = [];

        foreach ($items as $key => $item) {
            $resolvedKey = Support::enumValue($callback($item, $key));

            if (is_object($resolvedKey)) {
                $resolvedKey = (string) $resolvedKey;
            }

            $results[$resolvedKey] = $item;
        }

        return $results;
    };
}
