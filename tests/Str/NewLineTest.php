<?php

use function Spatie\Piper\Str\newLine;

it('appends newline characters', function () {
    expect('Laravel' |> newLine(2))->toBe('Laravel'.PHP_EOL.PHP_EOL);
});
