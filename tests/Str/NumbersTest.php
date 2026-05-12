<?php

use function Spatie\Piper\Str\numbers;

it('returns only the numbers from a string', function () {
    expect('Phone: +1 (555) 123-4567' |> numbers())->toBe('15551234567');
});
