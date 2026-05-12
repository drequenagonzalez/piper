<?php

use function Spatie\Piper\Str\repeat;

it('repeats the string', function () {
    expect('ab' |> repeat(3))->toBe('ababab');
});
