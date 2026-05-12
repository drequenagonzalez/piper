<?php

namespace Spatie\Piper\Str;

use Closure;

function finish(string $cap): Closure
{
    return function (string $value) use ($cap): string {
        $quoted = preg_quote($cap, '/');

        return preg_replace('/(?:'.$quoted.')+$/u', '', $value).$cap;
    };
}
