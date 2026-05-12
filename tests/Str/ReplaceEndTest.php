<?php

use function Spatie\Piper\Str\replaceEnd;

it('replaces text at the end of a string', function () {
    expect('Hello World' |> replaceEnd('World', 'Laravel'))->toBe('Hello Laravel');
});
