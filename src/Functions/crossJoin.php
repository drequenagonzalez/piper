<?php

namespace Spatie\Piper;

use Closure;

function crossJoin(mixed ...$lists): Closure
{
    return function (array $items) use ($lists): array {
        $results = [[]];
        $arrays = array_merge([$items], array_map(Support::normalize(...), $lists));

        foreach ($arrays as $array) {
            $append = [];

            foreach ($results as $product) {
                foreach ($array as $item) {
                    $product[] = $item;
                    $append[] = $product;
                    array_pop($product);
                }
            }

            $results = $append;
        }

        return $results;
    };
}
