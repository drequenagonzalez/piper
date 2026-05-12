<?php

use function Spatie\Piper\Str\lcfirst;

it('lowercases the first character', function () {
    expect('Laravel' |> lcfirst())->toBe('laravel');
});
