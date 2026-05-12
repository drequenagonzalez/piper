<?php

use function Spatie\Piper\Str\ucfirst;

it('uppercases the first character', function () {
    expect('laravel' |> ucfirst())->toBe('Laravel');
});
