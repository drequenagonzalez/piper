<?php

use function Spatie\Piper\Str\explode;

it('explodes a string by separator', function () {
    expect('a,b,c' |> explode(','))->toBe(['a', 'b', 'c']);
});
