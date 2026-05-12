<?php

namespace Spatie\Piper\Str;

use Closure;

function toBase64(): Closure
{
    return fn (string $string): string => base64_encode($string);
}
