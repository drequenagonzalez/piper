<?php

use function Spatie\Piper\Str\deduplicate;

it('deduplicates repeated characters', function () {
    expect('foo--bar---baz' |> deduplicate('-'))->toBe('foo-bar-baz');
});
