<?php

declare(strict_types=1);

test('integer() method returns an integer value', function () {
    $value = 🙃()->number->integer();

    expect($value)->toBeInt();
});
