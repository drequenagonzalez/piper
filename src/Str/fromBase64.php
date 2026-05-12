<?php

namespace Spatie\Piper\Str;

use Closure;

function fromBase64(bool $strict = false): Closure
{
    return fn (string $string): string|false => base64_decode($string, $strict);
}
