<?php

use function Spatie\Piper\Str\replaceLast;

it('replaces the last occurrence of text', function () {
    expect('the quick brown fox jumps over the lazy dog' |> replaceLast('the', 'a'))
        ->toBe('the quick brown fox jumps over a lazy dog');
});
