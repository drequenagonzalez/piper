<?php

namespace Spatie\Piper\Str;

function password(int $length = 32, bool $letters = true, bool $numbers = true, bool $symbols = true, bool $spaces = false): string
{
    $characters = '';
    $characters .= $letters ? 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' : '';
    $characters .= $numbers ? '0123456789' : '';
    $characters .= $symbols ? '~!@#$%^&*()_-+={[}]|:;"<,>.?/' : '';
    $characters .= $spaces ? ' ' : '';

    if ($characters === '') {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    }

    $password = '';
    $max = strlen($characters) - 1;

    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[random_int(0, $max)];
    }

    return $password;
}
