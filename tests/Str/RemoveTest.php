<?php

use function Spatie\Piper\Str\remove;

it('removes search values from the string', function () {
    expect('Framework' |> remove('work'))->toBe('Frame');
});
