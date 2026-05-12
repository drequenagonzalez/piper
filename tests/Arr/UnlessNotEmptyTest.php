<?php

use function Spatie\Piper\Arr\unlessNotEmpty;

it('runs the callback when the array is empty', function () {
    expect([] |> unlessNotEmpty(fn (array $items): array => ['empty']))->toBe(['empty']);
});
