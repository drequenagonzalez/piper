<?php

use function Spatie\Piper\Str\replaceStart;

it('replaces text at the start of a string', function () {
    expect('Hello World' |> replaceStart('Hello', 'Laravel'))->toBe('Laravel World');
});
