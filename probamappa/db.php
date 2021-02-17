<?php

$connect = new mysqli("localhost","root","","f1","3306");

if ($connect -> connect_errno){
    die('SQL hiba: '. $connect -> connect_error);
}
if (!$connect -> set_charset("utf8")){
    print("Karakterkódolást nem sikerült beállítani!");
}