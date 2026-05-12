<?php

namespace Spatie\Piper\Str;

use Closure;

use function Spatie\Piper\Support\stringTitle;

function title(): Closure
{
    return fn (string $value): string => stringTitle($value);
}
