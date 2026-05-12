<?php

use function Spatie\Piper\Arr\value;

it('returns a single value by key from the first item', function () {
    expect([
        ['name' => 'Taylor'],
        ['name' => 'Abigail'],
    ] |> value('name'))->toBe('Taylor');
});
