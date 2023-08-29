<?php

declare (strict_type=1);

function dd(mixed $value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    die();
}