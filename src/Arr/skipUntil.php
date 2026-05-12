<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\useAsCallable;

function skipUntil(mixed $value): Closure
{
    return function (array $items) use ($value): array {
        $callback = useAsCallable($value) ? $value : fn (mixed $item): bool => $item == $value;
        $result = [];
        $found = false;

        foreach ($items as $key => $item) {
            if (! $found && $callback($item, $key)) {
                $found = true;
            }

            if ($found) {
                $result[$key] = $item;
            }
        }

        return $result;
    };
}
