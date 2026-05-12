<?php

use function Spatie\Piper\Str\isJson;

it('checks whether a string is valid json', function () {
    expect('{"name":"Taylor"}' |> isJson())->toBeTrue();
    expect('not-json' |> isJson())->toBeFalse();
});
