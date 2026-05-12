<?php

use function Spatie\Piper\Str\append;

it('appends all values to the string', function () {
    expect('Framework' |> append(' for ', 'PHP'))->toBe('Framework for PHP');
});
