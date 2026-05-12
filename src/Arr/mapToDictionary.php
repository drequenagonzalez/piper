<?php

namespace Spatie\Piper\Arr;

use Closure;

function mapToDictionary(callable $callback): Closure
{
    return function (array $items) use ($callback): array {
        $dictionary = [];

        foreach ($items as $key => $item) {
            $pair = $callback($item, $key);
            $dictionaryKey = array_key_first($pair);
            $dictionary[$dictionaryKey][] = $pair[$dictionaryKey];
        }

        return $dictionary;
    };
}
