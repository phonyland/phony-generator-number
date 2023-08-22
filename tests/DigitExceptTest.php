<?php

declare(strict_types=1);

test('digitExcept() method returns an integer value', function (): void {
    $value = 🙃()->number->digitExcept();

    expect($value)->toBeInt();
});

test('digitExcept() method returns a digit except given digit', function (): void {
    $value = 🙃()->number->digitExcept(1, 2);
    expect($value)->not()->toBe(1);

    $value = 🙃()->number->digitExcept(0, 2);
    expect($value)->not()->toBe(0);

    $value = 🙃()->number->digitExcept(1, 2);
    expect($value)->not()->toBe(1);
});
