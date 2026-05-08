<?php

namespace Spatie\Piper;

use Closure;

function undot(): Closure
{
    return function (array $items): array {
        $results = [];

        foreach ($items as $key => $value) {
            Support::dataSet($results, $key, $value);
        }

        return $results;
    };
}
