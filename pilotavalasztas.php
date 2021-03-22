<?php
session_start();

$conn = mysqli_connect("localhost","root","","f1_1950-2020_adatbazis","3306");
if(isset($_POST['pilota1']))
{    
    $p1=$_POST['pilota1'];
    
    var_dump($p1);
    
        
}




if(isset($_POST['pilota2']))
{
    $p2=$_POST['pilota2'];
    
}

mysqli_close($conn);

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
          <th scope="col" style="color: white; background-color:black;"><?php echo $p1 ?></th>
          <th scope="col" style="color: white; background-color:red"><?php echo $p2 ?></th>
          
        </tr>
      </thead>
      <tbody>
        <tr class="table-secondary">
          <th scope="row" style="text-align:justify">Győzelmek</th>
          <td>Column content</td>
          <td>Column content</td>
        </tr>
        <tr class="table-light">
          <th scope="row" style="text-align:justify">Pódiumok</th>
          <td>Column content</td>
          <td>Column content</td>
        </tr>
        <tr class="table-secondary">
          <th scope="row" style="text-align:justify">Pole poziciók</th>
          <td>Column content</td>
          <td>Column content</td>
        </tr>
        <tr class="table-light">
          <th scope="row" style="text-align:justify">Leggyorsabb körök</th>
          <td>Column content</td>
          <td>Column content</td>
        </tr>
        <tr class="table-secondary">
          <th scope="row" style="text-align:justify">Futamok</th>
          <td>Column content</td>
          <td>Column content</td>
        </tr>
        <tr class="table-light">
          <th scope="row" style="text-align:justify">Danger</th>
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







