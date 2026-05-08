<?php

namespace Spatie\Piper;

use Closure;

function skipUntil(mixed $value): Closure
{
    return function (array $items) use ($value): array {
        $callback = Support::useAsCallable($value) ? $value : fn (mixed $item): bool => $item == $value;
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
