<?php

use function Spatie\Piper\Arr\toJson;

it('encodes the array as json', function () {
    expect(['name' => 'Taylor'] |> toJson())->toBe('{"name":"Taylor"}');
});
