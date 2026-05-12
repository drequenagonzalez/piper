<?php

namespace Spatie\Piper\Str;

use Closure;

use function Spatie\Piper\Support\stringTitle;
use function Spatie\Piper\Support\stringUcsplit;

function headline(): Closure
{
    return function (string $value): string {
        $parts = \explode(' ', $value);

        $parts = count($parts) > 1
            ? array_map(stringTitle(...), $parts)
            : array_map(stringTitle(...), stringUcsplit(implode('_', $parts)));

        $collapsed = str_replace(['-', '_', ' '], '_', implode('_', $parts));

        return implode(' ', array_filter(\explode('_', $collapsed)));
    };
}
