<?php

use function Spatie\Piper\Str\between;

it('returns the string between two delimiters', function () {
    expect('[first] middle [second]' |> between('[', ']'))->toBe('first] middle [second');
});
