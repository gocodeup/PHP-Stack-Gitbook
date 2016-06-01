<?php

$a = 5;
$b = 10;
$c = '10';

// TODO: Shorten these two if statements to a single if/else
if ($a < $b) {
    echo "$a is less than $b\n";
}
if ($a >= $b) {
    echo "$a is greater than or equal to $b\n";
}

// TODO: Shorten these two if statements to a single if/else
if ($b < $c) {
    echo "$b is less than $c\n";
}
if ($b >= $c) {
    echo "$b is greater than or equal to $c\n";
}

// TODO:
// combine the next 3 conditionals into one
// if/elseif/else block that checks in order for:
// identical, equal, not equal/identical
if ($b === $c) {
    echo "$b is identical to $c\n";
}
if ($b == $c) {
    echo "$b is equal to $c\n";
}
if ($b != $c) {
    echo "$b is not equal to $c\n";
}
