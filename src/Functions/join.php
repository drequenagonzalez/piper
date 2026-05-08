<?php

namespace Spatie\Piper;

use Closure;

function join(string $glue, string $finalGlue = ''): Closure
{
    return function (array $items) use ($glue, $finalGlue): string {
        if ($finalGlue === '') {
            return \implode($glue, $items);
        }

        $count = \count($items);

        if ($count === 0) {
            return '';
        }

        if ($count === 1) {
            return (string) ($items |> last());
        }

        $finalItem = array_pop($items);

        return \implode($glue, $items).$finalGlue.$finalItem;
    };
}
