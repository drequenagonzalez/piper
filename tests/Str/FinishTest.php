<?php

use function Spatie\Piper\Str\finish;

it('adds a suffix when missing', function () {
    expect('this/string' |> finish('/'))->toBe('this/string/');
    expect('this/string/' |> finish('/'))->toBe('this/string/');
});
