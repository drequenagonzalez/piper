<?php

namespace Spatie\Piper\Arr;

use Closure;

function shuffle(): Closure
{
    return function (array $items): array {
        $values = array_values($items);
        shuffle($values);

        return $values;
    };
}
