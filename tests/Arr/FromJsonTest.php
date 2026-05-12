<?php

use function Spatie\Piper\Arr\fromJson;

it('creates an array from json', function () {
    expect(fromJson('{"name":"Taylor"}'))->toBe(['name' => 'Taylor']);
});
