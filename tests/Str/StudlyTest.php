<?php

use function Spatie\Piper\Str\studly;

it('converts strings to studly case', function () {
    expect('foo bar' |> studly())->toBe('FooBar');
});
