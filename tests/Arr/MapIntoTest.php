<?php

use function Spatie\Piper\Arr\mapInto;

class PiperMapIntoTestValue
{
    public function __construct(public mixed $value, public mixed $key) {}
}

it('maps values into new class instances', function () {
    $items = ['first' => 'Taylor'] |> mapInto(PiperMapIntoTestValue::class);

    expect($items['first'])->toBeInstanceOf(PiperMapIntoTestValue::class);
    expect($items['first']->value)->toBe('Taylor');
    expect($items['first']->key)->toBe('first');
});
