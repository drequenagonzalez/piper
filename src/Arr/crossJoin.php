<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\normalize;

function crossJoin(mixed ...$lists): Closure
{
    return function (array $items) use ($lists): array {
        $results = [[]];
        $arrays = array_merge([$items], array_map(normalize(...), $lists));

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
