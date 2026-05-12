<?php

use function Spatie\Piper\Arr\toPrettyJson;

it('encodes the array as pretty json', function () {
    expect(['name' => 'Taylor'] |> toPrettyJson())->toContain("\n");
});
