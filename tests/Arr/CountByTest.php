<?php

use function Spatie\Piper\Arr\countBy;

it('counts values by their value', function () {
    expect(['a', 'b', 'a'] |> countBy())->toBe(['a' => 2, 'b' => 1]);
});

it('counts values by callback result', function () {
    expect([1, 2, 3, 4, 5] |> countBy(fn (int $value): string => $value % 2 === 0 ? 'even' : 'odd'))->toBe([
        'odd' => 3,
        'even' => 2,
    ]);
});
