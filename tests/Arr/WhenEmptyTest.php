<?php

use function Spatie\Piper\Arr\whenEmpty;

it('runs the callback when the array is empty', function () {
    expect([] |> whenEmpty(fn (array $items): array => ['empty']))->toBe(['empty']);
});
