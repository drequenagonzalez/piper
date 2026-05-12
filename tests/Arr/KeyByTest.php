<?php

use function Spatie\Piper\Arr\keyBy;

it('keys items by a key', function () {
    expect([
        ['id' => 1, 'name' => 'Taylor'],
        ['id' => 2, 'name' => 'Abigail'],
    ] |> keyBy('id'))->toHaveKey(2);
});
