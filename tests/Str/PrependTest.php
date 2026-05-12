<?php

use function Spatie\Piper\Str\prepend;

it('prepends all values to the string', function () {
    expect('Framework' |> prepend('Laravel '))->toBe('Laravel Framework');
});
