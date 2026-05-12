<?php

use function Spatie\Piper\Str\substrCount;

it('counts substring occurrences', function () {
    expect('one two one' |> substrCount('one'))->toBe(2);
});
