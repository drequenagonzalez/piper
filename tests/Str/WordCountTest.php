<?php

use function Spatie\Piper\Str\wordCount;

it('counts words in a string', function () {
    expect('hello world' |> wordCount())->toBe(2);
});
