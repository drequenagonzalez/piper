<?php

use function Spatie\Piper\Str\replaceFirst;

it('replaces the first occurrence of text', function () {
    expect('the quick brown fox jumps over the lazy dog' |> replaceFirst('the', 'a'))
        ->toBe('a quick brown fox jumps over the lazy dog');
});
