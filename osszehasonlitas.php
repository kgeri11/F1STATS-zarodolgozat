<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "f1_1950-2020_adatbazis", "3306");
$sql = "SELECT DISTINCT results.driverId,drivers.forename,drivers.surname FROM `results` LEFT JOIN drivers ON results.driverId = drivers.driverId ORDER BY drivers.forename ASC";
$result = $conn->query($sql);

$elsopilota="";
$masodikpilota="";
if (!$result) {
  die("Hibás sql lekérdezés!");
}
while ($row = $result->fetch_assoc()) {
  $id = $row["driverId"];
  $fname = $row["forename"];
  $sname = $row["surname"];
  $elsopilota .= '<option value"' . $id . '">' .$id.' '. $fname .' '.  $sname .'</option>';
  $masodikpilota .= '<option value"' . $id . '">'.$id.' ' . $fname  .' '. $sname . '</option>';
}

$return["pilota1"] = $elsopilota;
$return["pilota2"] = $masodikpilota;
 

echo json_encode($return);


mysqli_close($conn);
echo file_get_contents('html/head.html');
if (!empty($_SESSION['userid'])){
    echo file_get_contents('html/menu_in.html');
} else {
    echo file_get_contents('html/menu_out.html');
}
?>




  <!--Bevezető-->
    <div class="jumbotron">
      <h1 class="display-3">Head-to-Head</h1>
      <p class="lead">Itt összehasonlíthatsz két általad válaszott pilótát <br> a megadott szempontok alapján a táblázatban</p>
      <hr class="my-4">
      <p>A pilótákat a lenyíló ablakokban lehet kiválasztani</p>     
    </div>



  <div style="margin-top: 5%;" class="container-lg ">
    <div class="row">
      <div class="col-2" >        
      </div>
      <div class="col-8 bg-dark text-center">
      <label>Pilóta:</label>
        <form class="form-group w-auto"  action="pilotavalasztas.php" method="post">
         
          <select class="form-control" name="pilota1" >
            <option  value="-1">---Válassz---</option>
            <?php
            echo $elsopilota;       
            ?>            
          </select>
          
          <select style="margin-top: 2%;" class="form-control" name="pilota2">
            <option value="-1">---Válassz---</option>
            <?php
            echo $masodikpilota;
            ?>
          </select>
          <button class="btn btn-primary btn-lg form-control" type="submit" style="margin-top:3%;">Küldés</button>
        </form>
      </div>
      <div class="col-2" >        
      </div>      
    </div>
  </div>






  <br />
  <br />





  <div class="table-responsive">
    <table class="table table-hover" style="text-align:center; margin-bottom:5%;">
      <thead>
        <tr>
          <th scope="col">Type</th>
          <th scope="col" style="color: white; background-color:black;">1.Versenyző</th>
          <th scope="col" style="color: white; background-color:red">2.Versenyző</th>
          
        </tr>
      </thead>
      <tbody>
        <tr class="table-secondary">
          <th scope="row" style="text-align:justify">Győzelmek</th>
          <td>-</td>
          <td>-</td>
        </tr>
        <tr class="table-light">
          <th scope="row" style="text-align:justify">Pódiumok</th>
          <td>-</td>
          <td>-</td>
        </tr>
        <tr class="table-secondary">
          <th scope="row" style="text-align:justify">Pole poziciók</th>
          <td>-</td>
          <td>-</td>
        </tr>
        <tr class="table-light">
          <th scope="row" style="text-align:justify">Karrier pontokabb körök</th>
          <td>-</td>
          <td>-</td>
        </tr>
        <tr class="table-secondary">
          <th scope="row" style="text-align:justify">Futamok</th>
          <td>-</td>
          <td>-</td>
        </tr>
        <tr class="table-light">
          <th scope="row" style="text-align:justify">Első futam</th>
          <td>-</td>
          <td>-</td>
        </tr>
        <tr class="table-secondary">
          <th scope="row" style="text-align:justify">Megtett körök</th>
          <td>-</td>
          <td>-</td>
        </tr>
        <tr class="table-light">
          <th scope="row" style="text-align:justify">Átlagos rajtpozíció</th>
          <td>-</td>
          <td>-</td>
        </tr>
        <tr class="table-secondary">
          <th scope="row" style="text-align:justify">Átlagos helyezés</th>
          <td>-</td>
          <td>-</td>
        </tr>
        
      </tbody>
    </table>
  </div>
</body>
<?php
echo file_get_contents('html/footer.html');
?>