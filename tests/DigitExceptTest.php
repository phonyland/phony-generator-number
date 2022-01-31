<?php

declare(strict_types=1);

test('digitExcept() method returns an integer value', function () {
    $value = 🙃()->number->digitExcept();

    expect($value)->toBeInt();
});
