<?php

$arr = array(1, 2, 3, 4, 2, 2);

foreach ($arr as $chave => $valor) {
    if ($arr[$valor] === 2) {
        $somador = $arr[$valor];
    }
}

var_dump($somador);
