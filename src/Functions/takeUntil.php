<?php

namespace Spatie\Piper;

use Closure;

function takeUntil(mixed $value): Closure
{
    return function (array $items) use ($value): array {
        $callback = Support::useAsCallable($value) ? $value : fn (mixed $item): bool => $item == $value;
        $result = [];

        foreach ($items as $key => $item) {
            if ($callback($item, $key)) {
                break;
            }

            $result[$key] = $item;
        }

        return $result;
    };
}
