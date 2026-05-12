<?php

namespace Spatie\Piper\Str;

use Closure;

function start(string $prefix): Closure
{
    return function (string $value) use ($prefix): string {
        $quoted = preg_quote($prefix, '/');

        return $prefix.preg_replace('/^(?:'.$quoted.')+/u', '', $value);
    };
}
