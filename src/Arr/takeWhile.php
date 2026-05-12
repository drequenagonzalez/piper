<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\useAsCallable;

function takeWhile(mixed $value): Closure
{
    return function (array $items) use ($value): array {
        $callback = useAsCallable($value) ? $value : fn (mixed $item): bool => $item == $value;
        $result = [];

        foreach ($items as $key => $item) {
            if (! $callback($item, $key)) {
                break;
            }

            $result[$key] = $item;
        }

        return $result;
    };
}
