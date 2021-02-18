<?php
header('Content-Type: application/json');

$conn = mysqli_connect("127.0.0.1","statsf1","kJpf@MD@pAK6","statsf1");

if($conn -> connect_errno)
{
    die ("Nem sikerült elérni az adatbázist!");
}
if (!$conn ->set_charset("UTF8"))
{
    echo"karakterkodolasi hiba";
}