<?php

namespace Spatie\Piper\Str;

use Closure;
use Traversable;

function replaceArray(string $search, iterable $replace): Closure
{
    return function (string $subject) use ($search, $replace): string {
        if ($replace instanceof Traversable) {
            $replace = iterator_to_array($replace, preserve_keys: false);
        }

        $segments = \explode($search, $subject);
        $result = array_shift($segments);

        foreach ($segments as $segment) {
            $result .= (array_shift($replace) ?? $search).$segment;
        }

        return $result;
    };
}
