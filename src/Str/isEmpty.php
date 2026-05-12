<?php

namespace Spatie\Piper\Str;

use Closure;

function isEmpty(): Closure
{
    return fn (string $value): bool => $value === '';
}
