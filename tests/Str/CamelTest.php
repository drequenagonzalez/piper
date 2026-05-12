<?php

use function Spatie\Piper\Str\camel;

it('converts strings to camel case', function () {
    expect('foo_bar' |> camel())->toBe('fooBar');
});
