<?php

namespace Spatie\Piper;

use Closure;
use Traversable;

function collapseWithKeys(): Closure
{
    return function (array $items): array {
        $results = [];

        foreach ($items as $values) {
            if ($values instanceof Traversable) {
                $values = iterator_to_array($values);
            }

            if (is_array($values)) {
                $results = array_replace($results, $values);
            }
        }

        return $results;
    };
}
