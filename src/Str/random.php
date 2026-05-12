<?php

namespace Spatie\Piper\Str;

function random(int $length = 16): string
{
    $string = '';

    while (($remaining = $length - strlen($string)) > 0) {
        $bytes = random_bytes($remaining);
        $string .= \substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $remaining);
    }

    return $string;
}
