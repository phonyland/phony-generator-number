<?php

declare(strict_types=1);

test('digit() method returns an integer value', function () {
    $value = 🙃()->number->digit();

    expect($value)->toBeInt();
});
