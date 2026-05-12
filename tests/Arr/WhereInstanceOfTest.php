<?php

use function Spatie\Piper\Arr\whereInstanceOf;

it('filters items by object type', function () {
    expect([new DateTimeImmutable, new stdClass, 'nope'] |> whereInstanceOf(DateTimeImmutable::class))->toHaveCount(1);
});
