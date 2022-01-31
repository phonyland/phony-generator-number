<?php

test('integerWithin() method returns an integer value', function () {
    $value = 🙃()->number->integerWithin();

    expect($value)->toBeInt();
});