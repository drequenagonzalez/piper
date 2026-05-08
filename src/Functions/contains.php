<?php

namespace Spatie\Piper;

use Closure;

function contains(mixed ...$arguments): Closure
{
    return function (array $items) use ($arguments): bool {
        if (\count($arguments) === 1) {
            $key = $arguments[0];

            if (Support::useAsCallable($key)) {
                foreach ($items as $itemKey => $item) {
                    if ($key($item, $itemKey)) {
                        return true;
                    }
                }

                return false;
            }

            return in_array($key, $items);
        }

        return $items |> contains(Support::operatorForWhere($arguments[0], $arguments[1] ?? null, $arguments[2] ?? null, \count($arguments)));
    };
}
