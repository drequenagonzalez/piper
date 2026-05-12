<?php

namespace Spatie\Piper\Arr;

use Closure;

function toPrettyJson(int $options = 0): Closure
{
    return function (array $items) use ($options): string {
        return $items |> toJson(JSON_PRETTY_PRINT | $options);
    };
}
