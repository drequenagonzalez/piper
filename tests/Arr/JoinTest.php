<?php

use function Spatie\Piper\Arr\join;

it('joins values with a glue and final glue', function () {
    expect(['a', 'b', 'c'] |> join(', ', ' and '))->toBe('a, b and c');
});
