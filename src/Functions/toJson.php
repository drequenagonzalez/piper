<?php

namespace Spatie\Piper;

use Closure;

function toJson(int $options = 0): Closure
{
    return function (array $items) use ($options): string {
        return json_encode(($items |> toArray()), $options);
    };
}
