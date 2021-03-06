<?php

require_once("connect.php");
$sql = "SELECT DISTINCT results.driverId,CONCAT_WS(' ',drivers.forename,drivers.surname) AS fullname FROM `results` LEFT JOIN drivers ON results.driverId = drivers.driverId ORDER BY `results`.`driverId` ASC";
$result = $conn->query($sql);

if(!$result)
{
    die("Hibás sql lekérdezés!");
}


mysqli_close($conn);









