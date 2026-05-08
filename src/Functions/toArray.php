<?php

namespace Spatie\Piper;

use Closure;

function toArray(): Closure
{
    return function (array $items): array {
        return $items |> map(function (mixed $value): mixed {
            if (is_array($value)) {
                return $value |> toArray();
            }

            if (is_object($value) && method_exists($value, 'toArray')) {
                return $value->toArray();
            }

            return $value;
        });
    };
}
