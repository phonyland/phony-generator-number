<?php

declare(strict_types=1);

test('integerWeighted() method returns an integer value', function () {
    $value = 🙃()->number->integerWeighted();

    expect($value)->toBeInt();
});
