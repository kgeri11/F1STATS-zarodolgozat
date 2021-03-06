<?php
session_start();
$conn = mysqli_connect("localhost","root","","f1_1950-2020_adatbazis","3306");
$sql = "SELECT DISTINCT results.driverId,CONCAT_WS(' ',drivers.forename,drivers.surname) AS fullname FROM `results` LEFT JOIN drivers ON results.driverId = drivers.driverId ORDER BY `fullname` ASC";
$result = $conn->query($sql);

if(!$result)
{
    die("Hibás sql lekérdezés!");
}
while ($row = $result->fetch_assoc()) {
  $id = $row["driverId"];
  $nev = $row["fullname"];
  $html.='<option value"' . $row["driverId"] . '">' . $row["fullname"] . '</option>';
}

mysqli_close($conn);

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
  <link rel="stylesheet" href="footer.css" />
  <link rel="stylesheet" href="bootstrap.css" />
  <link rel="stylesheet" href="osszehasonlitas.css" />
  <title>F1Stats</title>

</head>

<body>
  <!--Navigációs menü-->
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="fooldal.html">F1_SATS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="fooldal.html">Főoldal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="statisztikak.html">Statisztikák</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="osszehasonlitas.php">Összehasonlítás</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="specialis.html">Speciális</a>
        </li>

      </ul>
      <form class="form-inline my-2 my-lg-0">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Belépés</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Regisztráció</a>
          </li>
        </ul>
      </form>

    </div>

  </nav>



  <!--Bevezető-->
  <div id="bevezeto">
    <div class="jumbotron">
      <h1 class="display-3">Head-to-Head</h1>
      <p class="lead">Itt összehasonlíthatsz két általad válaszott pilótát <br> bizonyos szempontok alapján egy táblázatban</p>
      <hr class="my-4">
      <p>A pilótákat a lenyíló ablakokban tudod kiválasztani</p>
      <p class="lead">
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
      </p>
    </div>
  </div>




  <label>Pilóta:</label>
  <form action="pilotavalasztas.php" method="get">
    <select name="pilotak">
      <option value="-1">---Válassz---</option>
      <?php      
      echo $html;
      ?>
    </select>
  </form>





  <br />
  <br />




  <div class="container">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Type</th>
          <th scope="col">Column heading</th>
          <th scope="col">Column heading</th>
          <th scope="col">Column heading</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-active">
          <th scope="row">Active</th>
          <td>Column content</td>
          <td>Column content</td>
          <td>Column content</td>
        </tr>
        <tr>
          <th scope="row">Default</th>
          <td>Column content</td>
          <td>Column content</td>
          <td>Column content</td>
        </tr>
        <tr class="table-primary">
          <th scope="row">Primary</th>
          <td>Column content</td>
          <td>Column content</td>
          <td>Column content</td>
        </tr>
        <tr class="table-secondary">
          <th scope="row">Secondary</th>
          <td>Column content</td>
          <td>Column content</td>
          <td>Column content</td>
        </tr>
        <tr class="table-success">
          <th scope="row">Success</th>
          <td>Column content</td>
          <td>Column content</td>
          <td>Column content</td>
        </tr>
        <tr class="table-danger">
          <th scope="row">Danger</th>
          <td>Column content</td>
          <td>Column content</td>
          <td>Column content</td>
        </tr>
        <tr class="table-warning">
          <th scope="row">Warning</th>
          <td>Column content</td>
          <td>Column content</td>
          <td>Column content</td>
        </tr>
        <tr class="table-info">
          <th scope="row">Info</th>
          <td>Column content</td>
          <td>Column content</td>
          <td>Column content</td>
        </tr>
        <tr class="table-light">
          <th scope="row">Light</th>
          <td>Column content</td>
          <td>Column content</td>
          <td>Column content</td>
        </tr>
        <tr class="table-dark">
          <th scope="row">Dark</th>
          <td>Column content</td>
          <td>Column content</td>
          <td>Column content</td>
        </tr>
      </tbody>
    </table>
  </div>





</body>
<footer>
  <div id="footer">
    <div class="footer navbar-fixed-bottom">
      <div class="row">
        <div class="col-6">
          <small-2">Kovács Gergő - 2021</small-2>
        </div>
        <div class="col-3"></div>
        <div class="col-3">Záródolgozat</div>
      </div>
    </div>
  </div>
</footer>

</html>