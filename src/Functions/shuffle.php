<?php

namespace Spatie\Piper;

use Closure;

function shuffle(): Closure
{
    return function (array $items): array {
        $values = array_values($items);
        shuffle($values);

        return $values;
    };
}
