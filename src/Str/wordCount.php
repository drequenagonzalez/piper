<?php

namespace Spatie\Piper\Str;

use Closure;

function wordCount(?string $characters = null): Closure
{
    return fn (string $string): int => str_word_count($string, 0, $characters);
}
