<?php

declare(strict_types=1);

test('integerLeadingZero() method returns a string value', function () {
    $value = 🙃()->number->integerLeadingZero();

    expect($value)->toBeString();
});
