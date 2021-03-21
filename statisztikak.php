<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/statisztikak.css" />
    
    <title>F1Stats</title>
  </head>
  <body>
    <?php
session_start();
if (!empty($_SESSION['userid'])){
    echo file_get_contents('html/menu_in.html');
} else {
    echo file_get_contents('html/menu_out.html');
}?>


    <!--Bevezető-->
    <div id="bevezeto">
      <div class="jumbotron">
        <h1 class="display-3">Az alapok</h1>
        <p class="lead">Ezen az oldaon megtalálod az alapvető statisztikai mutatókat vizualizált formában</p>
        <hr class="my-4">
        <p>A grafikonok a szövegdobozra kattintva nyithatók ki és csukhatók be</p>        
      </div>
    </div>

    <!--Oldal-->
    <div id="container-fluid">

      <br><br><br>

      
      <!--Kattintható győzelmek leírás-->
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-8">
            <div
              id="expand"
              class="alert alert-primary alert-dismissible alert-warning"
            >
              <h4 style="text-align: center" class="alert-heading">
                Legtöbb győzelemmel rendelkező pilóták
              </h4>
            </div>
          </div>
          <div class="col-2"></div>
        </div>
      </div>

      <!--Győzelmek grafikon-->
      <div id="egeszgyozelmek" class="container-fluid">
        <div class="row">
          
          <div class="col-8">
            <div class="wrapper">            
            <div class="container-fluid" id="chart-container">
              <canvas id="graphCanvas"></canvas>
            </div>
          </div>
          </div>          
          <div class="col-4 d-flex align-items-center justify-content-center">
          <p>
          Michael Schumaher megdönthetetlennek hitt 
          rekordját 2020-ban megdönttte Lewis Hamilton,
          így mostmár ő a legtöbb győzelemmel rendelkező pilóta
            </p>
          </div>
        </div>
      </div>

      <br>

      <!--Kattintható konstuktőri győzelmek leírás-->
      <div class="container-fluid">
        <div class="row">
          <div class="col-4" ></div>
          <div class="col-8">
            <div
              id="expand2"
              class="alert alert-primary alert-dismissible alert-warning"
            >
              <h4 style="text-align: center" class="alert-heading">
                Legtöbb győzelemmel rendelkező csapatok
              </h4>              
            </div>
          </div>
        </div>
      </div>

      <!--Konstruktőri győzelmek grafikon-->
      <div id="egeszkonstruktor" class="container-fluid">
        <div class="row">
          <div class="col-4 d-flex align-items-center justify-content-center">
            <p>
              Az alábbi ábra azon konstruktőröket tartalmazza, akik a FIA
              Formula–1 világbajnokságba számító nagydíjat nyertek. Az
              abszolút csúcsot az olasz Scuderia Ferrari tartja, ami az első
              verseny kivételével minden versenyen részt vett és ez alatt 238
              versenyt nyertek meg.
            </p>
          </div>
          <div class="col-8">
            <div class="media" id="chart-container">
              <canvas id="myChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <br>

      <!--Kattintható futam/év leírás-->
      <div class="container-fluid">
        <div class="row">
          <div class="col-8">
            <div
              id="expand3"
              class="alert alert-primary alert-dismissible alert-warning"
            >
              <h4 style="text-align: center; " class="alert-heading">
                Versenyek száma szezononként
              </h4>
              
            </div>
          </div>
          <div class="col-4">            
          </div>
        </div>
      </div>

      <!--Futam/év grafikon-->
      <div id="egeszfutamev" class="container-fluid">
        <div class="row">
          <div class="col-8">
            <div id="chart-container">
              <canvas id="graphRound"></canvas>              
            </div>
          </div>
          <div class="col-4 d-flex align-items-center justify-content-center">
            <p >
              Az 1950 óta megrendezett Formula–1 világbajnokság történetében
              41 különböző elnevezésű nagydíjat rendeztek, egy részük – akár
              ugyanazon szezonon belül – azonban csak a nemzeti nagydíj
              mellett megrendezett, más címért kiírt verseny volt.
            </p>
          </div>
        </div>
      </div>

      <br>

      <!--Kattintható helyszínek leírás-->
      <div class="container-fluid">
        <div class="row">
          <div class="col-4"></div>
          <div class="col-8">
            <div
              id="expand4"
              class="alert alert-primary alert-dismissible alert-warning"
            >
              <h4 style="text-align: center" class="alert-heading">
                Versenyek száma helyszínenként
              </h4>
              
            </div>
          </div>
        </div>
      </div>

      <!--Helyszínek grafikon-->
      <div id="egeszhelyszin" class="container-fluid">
        <div class="row">
          <div class="col-4 d-flex align-items-center justify-content-center">
            <p >
              A Forma 1 szűlőhazájának számító Angliában, valami a Ferrari hazai futamának tekintett Olasz nagydíj adott otthont eddig a legtöbb nagydíjnak.
            </p>
          </div>
          <div class="col-8">
            <div id="chart-container">
              <canvas
                id="graphLocations"                
              ></canvas>
            </div>
          </div>
        </div>
      </div>


      



      <!--Kattintható pole leírás-->
      <div class="container-fluid">
        <div class="row">
          <div class="col-8">
            <div
              id="expand5"
              class="alert alert-primary alert-dismissible alert-warning"
            >
              <h4 style="text-align: center; " class="alert-heading">
                Legtöbb pole pozícióval rendelkező pilóták
              </h4>
              
            </div>
          </div>
          <div class="col-4">            
          </div>
        </div>
      </div>

      <!--pole grafikon-->
      <div id="egeszpole" class="container-fluid">
        <div class="row">
          <div class="col-8">
            <div id="chart-container">
              <canvas id="graphPole"></canvas>              
            </div>
          </div>
          <div class="col-4 d-flex align-items-center justify-content-center">
            <p>              
              1950 óta pontosan 101 pilóta indulhatott az első rajtkockából. Ezek közül a legsikeresebbek láthatóak az alábbi ábrán.
            </p>
          </div>
        </div>
      </div>

      <br>

      <!--Kattintható valami#2 leírás-->
      <div class="container-fluid">
        <div class="row">
          <div class="col-4"></div>
          <div class="col-8">
            <div
              id="expand6"
              class="alert alert-primary alert-dismissible alert-warning"
            >
              <h4 style="text-align: center" class="alert-heading">
                GP rajtok száma
              </h4>
              
            </div>
          </div>
        </div>
      </div>

      <!--GP rajtok grafikon-->
      <div id="egeszindulas" class="container-fluid">
        <div class="row">
          <div class="col-4 d-flex align-items-center justify-content-center">
            <p >
              Az 1950 óta megrendezett Formula–1 világbajnokság történetében
              41 különböző elnevezésű nagydíjat rendeztek, egy részük – akár
              ugyanazon szezonon belül – azonban csak a nemzeti nagydíj
              mellett megrendezett, más címért kiírt verseny volt.
            </p>
          </div>
          <div class="col-8">
            <div id="chart-container">
              <canvas
                id="graphStart"                
              ></canvas>
            </div>
          </div>
        </div>
      </div>
    
    </div>

    <!-- grafikon scriptek-->
    <script>
      //#region Győzelmek
      $.post("php/gyoztesek.php", function (data) {
        console.log(data);
        var id = [];
        var name = [];
        var wins = [];

        for (var i in data) {
          id.push(data[i].driverId);
          name.push(data[i].surname);
          wins.push(data[i].wins);
        }

        var chartdata = {
          labels: name,
          datasets: [
            {
              label: "Győzelmek",
              backgroundColor: dynamicColors(),
              borderColor: dynamicColors(),
              hoverBackgroundColor: "#CCCCCC",
              hoverBorderColor: "#666666",
              data: wins,
            },
          ],
          options: { 
            maintainAspectRatio: false,           
            scales: {
              yAxes: [
                {
                  ticks: {
                    begintAtZero: true,
                  },
                },
              ],
            },
          },
        };

        var graphTarget = $("#graphCanvas");

        var barGraph = new Chart(graphTarget, {
          type: "bar",          
          fill: false,
          data: chartdata,
        });
      });
      //#endregion

      //#region Konstruktőri győzelmek

      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: "bar",
        
        data: {
          labels: [
            "Ferrari",
            "McLaren",
            "Mercedes",
            "Williams",
            "Team Lotus",
            "Red Bull",
            "Brabham",
            "Renault",
            "Benetton",
            "Tyrell",
          ],
          datasets: [
            {
              label: "Konstruktőri győzelmek",
              data: [238, 182, 115, 114, 79, 64, 35, 35, 27, 23],
              backgroundColor: [
                "rgba(192,0,0, 0.5)",
                "rgba(255,135,0, 0.5)",
                "rgba(0,210,190, 0.5)",
                "rgba(	0,130,250, 0.5)",
                "rgba(0, 66, 37, 0.5)",
                "rgba(6,0,239, 0.5)",
                "rgba(0, 66, 37, 0.5)",
                "rgba(255,245,0, 0.5)",
                "rgba(0,148,33, 0.5)",
                "rgba(56,119,255, 0.5)",
              ],
              borderColor: [
                "rgba(192,0,0, 1)",
                "rgba(255, 135, 0, 1)",
                "rgba(0,210,190, 1)",
                "rgba(	0,130,250, 1)",
                "rgba(255, 239, 0, 1)",
                "rgba(6,0,239, 1)",
                "rgba(0, 66, 37, 1)",
                "rgba(255,245,0, 1)",
                "rgba(0,148,33, 1)",
                "rgba(56,119,255, 1)",
              ],
              borderWidth: 1,
            },
          ],
        },
        options: {                    
          scales: {
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
          },
        },
      });
      //#endregion

      //#region Futamok grafikon script

      $.post("php/rPERs.php", function (dataRounds) {
        console.log(dataRounds);
        var year = [];
        var round = [];

        for (var i in dataRounds) {
          year.push(dataRounds[i].year);
          round.push(dataRounds[i].round);
        }

        var chartdata = {
          labels: year,
          datasets: [
            {
              label: "Versenyek száma",
              backgroundColor: dynamicColors(),
              borderColor: dynamicColors(),
              hoverBackgroundColor: "#CCCCCC",
              hoverBorderColor: "#666666",
              fill: false,
              data: round,
            },
          ],

          options: {
            maintainAspectRatio: false,
            scales: {
              yAxes: [
                {
                  ticks: {
                    begintAtZero: true,
                  },
                },
              ],
            },
          },
        };

        var graphTarget = $("#graphRound");

        var barGraph = new Chart(graphTarget, {
          type: "line",
          data: chartdata,
        });
      });
      //#endregion

      //#region Helyszínek grafikon script
      $.post("php/futamok.php", function (dataLocations) {
        console.log(dataLocations);
        var name = [];
        var alkalmak = [];

        for (var i in dataLocations) {
          name.push(dataLocations[i].name);
          alkalmak.push(dataLocations[i].alkalmak);
        }

        var chartdata = {
          labels: name,
          datasets: [
            {
              label: "Futam",
              backgroundColor: dynamicColors(),
              borderColor: dynamicColors(),
              hoverBackgroundColor: "#CCCCCC",
              hoverBorderColor: "#666666",
              data: alkalmak,
            },
          ],

          options: {
            maintainAspectRatio: false,
            scales: {
              yAxes: [
                {
                  ticks: {
                    begintAtZero: true,
                  },
                },
              ],
            },
          },
        };

        var graphTarget = $("#graphLocations");

        var barGraph = new Chart(graphTarget, {
          type: "bar",
          data: chartdata,
        });
      });

      //#endregion

      //#region Pole grafikon
      $.post("php/pole.php", function (dataPole) {
        console.log(dataPole);
        var name = [];
        var pole = [];

        for (var i in dataPole) {
          name.push(dataPole[i].surname);
          pole.push(dataPole[i].pole);
        }

        var chartdata = {
          labels: name,
          datasets: [
            {
              label: "Pole pozíciók",
              backgroundColor: dynamicColors(),
              borderColor: dynamicColors(),
              hoverBackgroundColor: "#CCCCCC",
              hoverBorderColor: "#666666",
              data: pole,
            },
          ],

          options: {
            maintainAspectRatio: false,
            scales: {
              yAxes: [
                {
                  ticks: {
                    begintAtZero: true,
                  },
                },
              ],
            },
          },
        };

        var graphTarget = $("#graphPole");

        var barGraph = new Chart(graphTarget, {
          type: "bar",
          data: chartdata,
        });
      });


      //#region Indulások grafikon
      $.post("php/indulas.php", function (dataIndulas) {
        console.log(dataIndulas);
        var name = [];
        var start = [];

        for (var i in dataIndulas) {
          name.push(dataIndulas[i].surname);
          start.push(dataIndulas[i].start);
        }

        var chartdata = {
          labels: name,
          datasets: [
            {
              label: "GP rajtok",
              backgroundColor: dynamicColors(),
              borderColor: dynamicColors(),
              hoverBackgroundColor: "#CCCCCC",
              hoverBorderColor: "#666666",
              data: start,
            },
          ],

          options: {
            maintainAspectRatio: false,
            scales: {
              yAxes: [
                {
                  ticks: {
                    begintAtZero: true,
                  },
                },
              ],
            },
          },
        };

        var graphTarget = $("#graphStart");

        var barGraph = new Chart(graphTarget, {
          type: "bar",
          data: chartdata,
        });
      });



      //#endregion

      

      //#region Randomszínek

      var dynamicColors = function () {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")";
      };

      //#endregion

      //#region Nyitás-csukás

      $(document).ready(function () {
        $("#expand").click(function () {
          $("#egeszgyozelmek").toggle("slow");
        });
      });

      $(document).ready(function () {
        $("#expand2").click(function () {
          $("#egeszkonstruktor").toggle("slow");
        });
      });

      $(document).ready(function () {
        $("#expand3").click(function () {
          $("#egeszfutamev").toggle("slow");
        });
      });

      $(document).ready(function () {
        $("#expand4").click(function () {
          $("#egeszhelyszin").toggle("slow");
        });
      });

      $(document).ready(function () {
        $("#expand5").click(function () {
          $("#egeszpole").toggle("slow");
        });
      });

      $(document).ready(function () {
        $("#expand6").click(function () {
          $("#egeszindulas").toggle("slow");
        });
      });

      //#endregion
    </script>
    
    

  </body>
 <?php echo file_get_contents('html/footer.html');