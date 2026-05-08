<?php

namespace Spatie\Piper;

use Closure;
use Stringable;

function implode(mixed $value, ?string $glue = null): Closure
{
    return function (array $items) use ($value, $glue): string {
        if (Support::useAsCallable($value)) {
            return \implode($glue ?? '', ($items |> map($value)));
        }

        $first = ($items |> first());

        if (is_array($first) || (is_object($first) && ! $first instanceof Stringable)) {
            return \implode($glue ?? '', ($items |> pluck($value)));
        }

        return \implode($value ?? '', $items);
    };
}
