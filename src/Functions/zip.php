<?php

namespace Spatie\Piper;

use Closure;

function zip(mixed ...$arrays): Closure
{
    return function (array $items) use ($arrays): array {
        $arrays = array_map(Support::normalize(...), $arrays);
        $results = [];

        foreach ($items as $key => $item) {
            $group = [$item];

            foreach ($arrays as $array) {
                $group[] = $array[$key] ?? null;
            }

            $results[] = $group;
        }

        return $results;
    };
}
