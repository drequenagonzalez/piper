<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\dataGet;
use function Spatie\Piper\Support\useAsCallable;

function containsStrict(mixed $key, mixed $value = null, bool $hasValue = false): Closure
{
    return function (array $items) use ($key, $value, $hasValue): bool {
        if ($hasValue) {
            return $items |> contains(fn (mixed $item): bool => dataGet($item, $key) === $value);
        }

        if (useAsCallable($key)) {
            foreach ($items as $itemKey => $item) {
                if ($key($item, $itemKey)) {
                    return true;
                }
            }

            return false;
        }

        return in_array($key, $items, true);
    };
}
