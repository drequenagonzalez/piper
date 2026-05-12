<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\useAsCallable;

function skipWhile(mixed $value): Closure
{
    return function (array $items) use ($value): array {
        $callback = useAsCallable($value) ? $value : fn (mixed $item): bool => $item == $value;
        $result = [];
        $skipping = true;

        foreach ($items as $key => $item) {
            if ($skipping && ! $callback($item, $key)) {
                $skipping = false;
            }

            if (! $skipping) {
                $result[$key] = $item;
            }
        }

        return $result;
    };
}
