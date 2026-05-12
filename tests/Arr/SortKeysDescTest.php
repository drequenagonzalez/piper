<?php

use function Spatie\Piper\Arr\sortKeysDesc;

it('sorts by keys descending', function () {
    expect(['a' => 1, 'b' => 2] |> sortKeysDesc())->toBe(['b' => 2, 'a' => 1]);
});
