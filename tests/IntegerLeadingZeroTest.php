<?php

declare(strict_types=1);

test('integerLeadingZero() method returns a string value', function (): void {
    $value = 🙃()->number->integerLeadingZero();

    expect($value)->toBeString();
});

test('integerLeadingZero() method returns a string leading with zeros', function (): void {
    $value = 🙃()->number->integerLeadingZero(10);

    expect($value)->toMatch('/^^(0{0,10}[0-9]{0,10}){1}$/');
});
