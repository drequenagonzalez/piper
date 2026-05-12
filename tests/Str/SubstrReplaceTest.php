<?php

use function Spatie\Piper\Str\substrReplace;

it('replaces text inside a substring range', function () {
    expect('1300' |> substrReplace(':', 2, 0))->toBe('13:00');
});
