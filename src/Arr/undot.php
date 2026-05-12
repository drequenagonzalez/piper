<?php

namespace Spatie\Piper\Arr;

use Closure;

use function Spatie\Piper\Support\dataSet;

function undot(): Closure
{
    return function (array $items): array {
        $results = [];

        foreach ($items as $key => $value) {
            dataSet($results, $key, $value);
        }

        return $results;
    };
}
