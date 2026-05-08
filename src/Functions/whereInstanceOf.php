<?php

namespace Spatie\Piper;

use Closure;

function whereInstanceOf(string|array $type): Closure
{
    return function (array $items) use ($type): array {
        $types = is_array($type) ? $type : [$type];

        return $items |> filter(function (mixed $value) use ($types): bool {
            foreach ($types as $classType) {
                if ($value instanceof $classType) {
                    return true;
                }
            }

            return false;
        });
    };
}
