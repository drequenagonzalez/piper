<?php

use function Spatie\Piper\Str\betweenFirst;

it('returns the first string between two delimiters', function () {
    expect('[first] middle [second]' |> betweenFirst('[', ']'))->toBe('first');
});
