
<?php
session_start();
$conn = mysqli_connect("localhost","root","","f1_1950-2020_adatbazis","3306");


if(isset($_POST['pilota1']))
{    
    $elsopilota=$_POST['pilota1']; 
    $elsobontott = explode( ' ', $elsopilota );         
}
if(isset($_POST['pilota2']))
{
    $masodikpilota=$_POST['pilota2'];    
    $masodikbontott = explode( ' ', $masodikpilota );
}
#region rajtok száma első pilóta
$sqlrajtelso = "SELECT COUNT(results.driverId) AS indulasok 
FROM `results` LEFT JOIN drivers ON results.driverId=drivers.driverId 
WHERE drivers.driverId = '$elsobontott[0]'";
$result = mysqli_query($conn,$sqlrajtelso);
while($row = mysqli_fetch_assoc($result))
{
  $datarajtelso = $row['indulasok'];
}
#endregion

#region rajtok száma második pilóta
$sqlrajtmasodik = "SELECT COUNT(results.driverId) AS indulasok 
FROM `results` LEFT JOIN drivers ON results.driverId=drivers.driverId 
WHERE drivers.driverId = '$masodikbontott[0]'";
$result = mysqli_query($conn,$sqlrajtmasodik);
while($row = mysqli_fetch_assoc($result))
{
  $datarajtmasodik = $row['indulasok'];
}
#endregion


#region győzelmek száma első pilóta
$sqlgyozelmekelso = "SELECT COUNT(results.positionOrder) AS wins 
FROM `results` LEFT JOIN drivers ON results.driverId=drivers.driverId
WHERE results.positionOrder = '1' AND drivers.driverId = '$elsobontott[0]'";
$result = mysqli_query($conn,$sqlgyozelmekelso);
while($row = mysqli_fetch_assoc($result))
{
  $datagyozelmekelso = $row['wins'];
  var_dump($datagyozelmekelso);
}
#endregion

#region győzelmek száma második pilóta
$sqlgyozelmekmasodik = "SELECT COUNT(results.positionOrder) AS wins 
FROM `results` LEFT JOIN drivers ON results.driverId=drivers.driverId
WHERE results.positionOrder = '1' AND drivers.driverId = '$masodikbontott[0]'";
$result = mysqli_query($conn,$sqlgyozelmekmasodik);
while($row = mysqli_fetch_assoc($result))
{
  $datagyozelmekmasodik = $row['wins'];
  var_dump($datagyozelmekmasodik);
}
#endregion

#region dobogós helyezések száma első pilóta
$sqldobogoelso = "SELECT COUNT(results.positionOrder) AS dobogo 
FROM `results` LEFT JOIN drivers ON results.driverId=drivers.driverId
WHERE results.positionOrder = '1' OR results.positionOrder = '2'  AND drivers.driverId = '1'";
$result = mysqli_query($conn,$sqldobogoelso);
while($row = mysqli_fetch_assoc($result))
{
  $datadobogoelso = $row['dobogo'];
  var_dump($datadobogoelso);
}
#endregion

#region pole száma első pilóta
$sqlpoleelso = "SELECT COUNT(results.grid) AS pole 
FROM `results` LEFT JOIN drivers ON results.driverId=drivers.driverId
WHERE results.grid = '1' AND drivers.driverId = '$elsobontott[0]'";
$result = mysqli_query($conn,$sqlpoleelso);
while($row = mysqli_fetch_assoc($result))
{
  $datapoleelso = $row['pole'];
  var_dump($datapoleelso);
}
#endregion

#region pole száma második pilóta
$sqlpolemasodik = "SELECT COUNT(results.grid) AS pole 
FROM `results` LEFT JOIN drivers ON results.driverId=drivers.driverId
WHERE results.grid = '1' AND drivers.driverId = '$masodikbontott[0]'";
$result = mysqli_query($conn,$sqlpolemasodik);
while($row = mysqli_fetch_assoc($result))
{
  $datapolemasodik = $row['pole'];
  var_dump($datapolemasodik);
}
#endregion

#region dobogós helyezések száma első pilóta
$sqldobogoelso = "SELECT COUNT(results.positionOrder) AS dobogo 
FROM `results` LEFT JOIN drivers ON results.driverId=drivers.driverId
WHERE results.positionOrder = '1' OR results.positionOrder = '2'  AND drivers.driverId = '1'";
$result = mysqli_query($conn,$sqldobogoelso);
while($row = mysqli_fetch_assoc($result))
{
  $datadobogoelso = $row['dobogo'];
  var_dump($datadobogoelso);
}
#endregion



#region dobogós helyezések száma második pilóta
$sqldobogomasodik = "SELECT COUNT(results.positionOrder) AS dobogo 
FROM `results` LEFT JOIN drivers ON results.driverId=drivers.driverId
WHERE results.positionOrder = '1' OR results.positionOrder = '2'  AND drivers.driverId = '1'";
$result = mysqli_query($conn,$sqldobogomasodik);
while($row = mysqli_fetch_assoc($result))
{
  $datadobogomasodik = $row['dobogo'];
  var_dump($datadobogomasodik);
}
#endregion

#region pontok száma első pilóta
$sqlpontokelso = "SELECT sum(results.points) AS pontok 
FROM `results` LEFT JOIN drivers ON results.driverId=drivers.driverId 
WHERE drivers.driverId = '$elsobontott[0]'";
$result = mysqli_query($conn,$sqlpontokelso);
while($row = mysqli_fetch_assoc($result))
{
  $datapontokelso = $row['pontok'];
  var_dump($datapontokelso);
}
#endregion

#region pontok száma második pilóta
$sqlpontokmasodik = "SELECT sum(results.points) AS pontok 
FROM `results` LEFT JOIN drivers ON results.driverId=drivers.driverId 
WHERE drivers.driverId = '$masodikbontott[0]'";
$result = mysqli_query($conn,$sqlpontokmasodik);
while($row = mysqli_fetch_assoc($result))
{
  $datapontokmekmasodik = $row['pontok'];
  var_dump($datapontokmekmasodik);
}
#endregion



mysqli_close($conn);

echo file_get_contents('html/head.html');
if (!empty($_SESSION['userid'])){
    echo file_get_contents('html/menu_in.html');
} else {
    echo file_get_contents('html/menu_out.html');
}
 ?>

<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <script type="text/javascript" src="js/Chart.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/osszehasonlitas.css" />
  <title>F1Stats</title>

</head>

<body>
  


  <!--Bevezető-->
  <div id="bevezeto">
    <div class="jumbotron">
      <h1 class="display-3">Head-to-Head</h1>
      <p class="lead">Itt összehasonlíthatsz két általad válaszott pilótát <br> a megadott szempontok alapján a táblázatban</p>
      <hr class="my-4">
      <p>Új összehasonlításhoz kattints ide</p>
      <p class="lead">
        <a class="btn btn-primary btn-lg" href="osszehasonlitas.php" role="button">Újrakezdés</a>
      </p>
    </div>
  </div>





  <br />
  <br />




  <div class="table-responsive">
    <table class="table table-hover" style="text-align:center">
      <thead>
        <tr>
          <th scope="col">Type</th>
          <th scope="col" style="color: white; background-color:black;"><?php echo $elsobontott[1].' '.$elsobontott[2] ?></th>
          <th scope="col" style="color: white; background-color:red"><?php echo $masodikbontott[1].' '.$masodikbontott[2] ?></th>
          
        </tr>
      </thead>
      <tbody>
        <tr class="table-secondary">
          <th scope="row" style="text-align:justify">Győzelmek</th>
          <td><?php echo $datagyozelmekelso ?></td>
          <td><?php echo $datagyozelmekmasodik ?></td>
        </tr>
        <tr class="table-light">
          <th scope="row" style="text-align:justify">Pódiumok</th>
          <td>Column content</td>
          <td>Column content</td>
        </tr>
        <tr class="table-secondary">
          <th scope="row" style="text-align:justify">Pole poziciók</th>
          <td><?php echo $datapoleelso ?></td>
          <td><?php echo $datapolemasodik ?></td>
        </tr>
        <tr class="table-light">
          <th scope="row" style="text-align:justify">Karrier pontok</th>
          <td><?php echo $datapontokelso ?></td>
          <td><?php echo $datapontokmekmasodik ?></td>
        </tr>
        <tr class="table-secondary">
          <th scope="row" style="text-align:justify">Futamok</th>
          <td><?php echo $datarajtelso ?></td>
          <td><?php echo $datarajtmasodik ?></td>
        </tr>
        <tr class="table-light">
          <th scope="row" style="text-align:justify">Első futam</th>
          <td>Column content</td>
          <td>Column content</td>
        </tr>
        <tr class="table-secondary">
          <th scope="row" style="text-align:justify">Warning</th>
          <td>Column content</td>
          <td>Column content</td>
        </tr>
        <tr class="table-light">
          <th scope="row" style="text-align:justify">Info</th>
          <td>Column content</td>
          <td>Column content</td>
        </tr>
        <tr class="table-secondary">
          <th scope="row" style="text-align:justify">Light</th>
          <td>Column content</td>
          <td>Column content</td>
        </tr>
        <tr class="table-light">
          <th scope="row" style="text-align:justify">Dark</th>
          <td>Column content</td>
          <td>Column content</td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
<?php
echo file_get_contents('html/footer.html');
?>







