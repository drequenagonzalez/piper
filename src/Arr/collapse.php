<?php

namespace Spatie\Piper\Arr;

use Closure;
use Traversable;

function collapse(): Closure
{
    return function (array $items): array {
        $results = [];

        foreach ($items as $values) {
            if ($values instanceof Traversable) {
                $values = iterator_to_array($values);
            }

            if (is_array($values)) {
                array_push($results, ...array_values($values));
            }
        }

        return $results;
    };
}
