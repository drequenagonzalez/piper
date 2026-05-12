<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\sortByMany;
use function Spatie\Piper\Support\valueRetriever;

function sortBy(mixed $callback, int $options = SORT_REGULAR, bool $descending = false): Closure
{
    return function (array $items) use ($callback, $options, $descending): array {
        if (is_array($callback) && ! is_callable($callback)) {
            return sortByMany($items, $callback);
        }

        $retriever = valueRetriever($callback);
        $results = [];

        foreach ($items as $key => $value) {
            $results[$key] = $retriever($value, $key);
        }

        $descending ? arsort($results, $options) : asort($results, $options);

        foreach (array_keys($results) as $key) {
            $results[$key] = $items[$key];
        }

        return $results;
    };
}
