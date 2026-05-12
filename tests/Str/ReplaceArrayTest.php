<?php

use function Spatie\Piper\Str\replaceArray;

it('replaces search values sequentially from an array', function () {
    expect('The event will take place between ? and ?' |> replaceArray('?', ['8:30', '9:00']))
        ->toBe('The event will take place between 8:30 and 9:00');
});
