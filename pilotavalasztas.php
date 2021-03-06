<?php
require_once("connect.php");
$sql = "SELECT DISTINCT results.driverId,drivers.forename,drivers.surname FROM `results` LEFT JOIN drivers ON results.driverId=drivers.driverId ORDER BY `results`.`driverId` ASC";
$result = $connect->query($sql);
if(!$result)
{
    die("Hibás sql lekérdezés!");
}
while($row = mysqli_fetch_array($sql)){
    echo '<option value="'.$row[1].'">'.$row[2].'</option>';
}
var_dump($row);
mysqli_close($conn);

echo json_encode($dataDrivers);

