<?php

namespace Spatie\Piper;

use Closure;

function concat(iterable $source): Closure
{
    return function (array $items) use ($source): array {
        $result = $items;

        foreach ($source as $item) {
            $result[] = $item;
        }

        return $result;
    };
}
