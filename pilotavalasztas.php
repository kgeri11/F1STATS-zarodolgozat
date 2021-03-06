<?php

require_once("connect.php");
$sql = "SELECT DISTINCT results.driverId,CONCAT_WS(' ',drivers.forename,drivers.surname) AS fullname FROM `results` LEFT JOIN drivers ON results.driverId = drivers.driverId ORDER BY `results`.`driverId` ASC";
$result = $conn->query($sql);

if(!$result)
{
    die("Hibás sql lekérdezés!");
}
while ($row = $result -> fetch_array()) {
  var_dump($row);
    $id = $row["driverId"];
    $nev = $row["fullname"];
    $valassz.='<option value"'.$row[0].'">'.$row[1].'</option>';
}

mysqli_close($conn);









