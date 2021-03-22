<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "f1_1950-2020_adatbazis", "3306");
$sql = "SELECT DISTINCT results.driverId,CONCAT_WS(' ',drivers.forename,drivers.surname) AS fullname FROM `results` LEFT JOIN drivers ON results.driverId = drivers.driverId ORDER BY `fullname` ASC";
$result = $conn->query($sql);

$html="";
if (!$result) {
  die("Hibás sql lekérdezés!");
}
while ($row = $result->fetch_assoc()) {
  $id = $row["driverId"];
  $nev = $row["fullname"];
  $html .= '<option value"' . $row["driverId"] . '">' . $row["fullname"] . '</option>';
}

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



  <div style="margin-top: 10%;" class="container-lg ">
    <div class="row">
      <div class="col-2" >        
      </div>
      <div class="col-8">
      <label>Pilóta:</label>
        <form class="form-group" action="pilotavalasztas.php" method="post">
          <select name="pilota1">
            <option value="-1">---Válassz---</option>
            <?php
            echo $html;            
            ?>
            <input type="hidden" name="id" id="id">
          </select>
          <select name="pilota2">
            <option value="-1">---Válassz---</option>
            <?php
            echo $html;
            ?>
          </select>
          <button type="submit" style="color: white; background-color:red; border-color:black;">Küldés</button>
          
        </form>
      </div>
      <div class="col-2" >        
      </div>      
    </div>
  </div>






  <br />
  <br />





  <div class="table-responsive">
    <table class="table table-hover">
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