<?php

test('float() method returns a float value', function () {
    $value = 🙃()->number->float();

    expect($value)->toBeFloat();
});
