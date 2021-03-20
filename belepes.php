<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "f1_1950-2020_adatbazis", "3306");
//$conn = mysqli_connect("127.0.0.1", "statsf1", "kJpf@MD@pAK6");

if ($conn->connect_errno) {
    die("Nem sikerült elérni az adatbázist!");
}
if (!$conn->set_charset("UTF8")) {
    echo "karakterkodolasi hiba";
}
$error = "";
if (($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_POST['email'])) && (!empty($_POST['pass']))) {
    $email = $conn->real_escape_string($_POST['email']);
    $pwd = $conn->real_escape_string($_POST['pass']);
    $sql = "SELECT * FROM user WHERE email = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $email, $pwdDb, $name, $subscription);

        if ($stmt->num_rows == 1) {
            $stmt->fetch();
            $hash = hash('sha512', $pwd);
            if (password_verify($hash, $pwdDb)) {
                $_SESSION['userid'] = $id;
                header('Location: index.php');
                exit();
            }
        }
    }
    $error = "Helytelen felhasználónév vagy jelszó!" . $id;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/specialis.css" />
    <title>F1Stats</title>
</head>

<body>

    <!--Navigációs menü-->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">F1_SATS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Főoldal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="statisztikak.php">Statisztikák</a>
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
                        <a class="nav-link" href="regisztracio.php">Regisztráció</a>
                    </li>
                </ul>
            </form>

        </div>

    </nav>


    <!--Bevezető-->
    <div id="bevezeto">
        <div class="jumbotron">
            <h1 class="display-3">Belépés</h1>
            <p class="lead">Jelentkezzen be profiljába</p>
            <hr class="my-4">

        </div>
    </div>


    <div class="container" style="margin-top:10%">
    <?php echo $error; ?>
        <div class="col-10 form-group">
        <form action="#" method="post" class="col">
            <h1 class="text-light text-center">Bejelentkezés</h1>
            <div>
            <label for="email">Email:</label>
            <input type="email" class="form-control " placeholder="Email" name="email" required>
            </div>
            <div>
            <label style="margin-top:2%" for="password">Jelszó:</label>
            <input type="password" class="form-control " placeholder="Jelszó" name="pass" required>
            </div>
            <div>
            <button style="margin-top:5%; margin-bottom:15% " type="submit" class="btn btn-primary ">Bejelentkezés</button>
            </div>           
        </form>
        </div>        
    </div>




</body>
<footer>
    <div id="footer">
        <div class="footer navbar-fixed-bottom navbar-expand-lg ">
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