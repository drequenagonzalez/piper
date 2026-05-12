<?php

use function Spatie\Piper\Str\title;

it('converts strings to title case', function () {
    expect('laravel framework' |> title())->toBe('Laravel Framework');
});
