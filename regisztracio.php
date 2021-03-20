<?php
$conn = mysqli_connect("localhost", "root", "", "f1_1950-2020_adatbazis", "3306");
//$conn = mysqli_connect("127.0.0.1", "statsf1", "kJpf@MD@pAK6");

if ($conn->connect_errno) {
    die("Nem sikerült elérni az adatbázist!");
}
if (!$conn->set_charset("UTF8")) {
    echo "karakterkodolasi hiba";
}
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $conn->real_escape_string($_POST['nev']);
    $pwd = $conn->real_escape_string($_POST['pass']);
    $pwdc = $conn->real_escape_string($_POST['passm']);
    $email = $conn->real_escape_string($_POST['email']);
    $subscription = $conn->real_escape_string($_POST['subscr']);
    $sql = "INSERT INTO user (email, pwd, name, subscription) VALUES (?, ?, ?, ?)";

    if ($pwd != $pwdc) {
        $error .= '<h5 class="text-danger text-center">A két jelszó nem egyforma!</h5>';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error .= '<h5 class="text-danger text-center">Nem megfelelő formátumú email cím!</h5>';
    }
    if (!preg_match("/^[a-z-' éáűőúöüóí]*$/i", $user)) {
        $error .= '<h5 class="text-danger text-center">Csak betűk és szókőz használható.</h5>';
    }

    if ($error == "") {
        if ($stmt = $conn->prepare($sql)) {
            $pwdHash = hash('sha512', $pwd);
            $pwdHash = password_hash($pwdHash, PASSWORD_DEFAULT);
            $stmt->bind_param('ssss', $email, $pwdHash, $user, $subscription);
            if (!$stmt->execute()) {
                $error = '<div><h3 class="text-danger text-center">Regisztráció sikertelen!</h3><h5 class="text-danger text-center"> Kérjünk próbálja meg újra!</h5></div> <br> ';
            } else {
                $error = '<div><h3 class="text-success text-center">Sikeres Regisztráció!</h3><h4 class="text-success text-center"> Bejelentkezéshez kattintson a belépés gombra </h4></div> <br> ';
            }
            $stmt->close();
        } else {
            $error = $conn->error;
        }
    }
}
$conn -> close();
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
        <a class="navbar-brand" href="index.html">F1_SATS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Főoldal</a>
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
                        <a class="nav-link" href="regisztracio.php">Regisztráció</a>
                    </li>
                </ul>
            </form>

        </div>

    </nav>


    <!--Bevezető-->
    <div id="bevezeto">
        <div class="jumbotron">
            <h1 class="display-3">Regisztráció</h1>
            <p class="lead">Regisztrálj és iratkozz fel hírleveleinkre!</p>
            <hr class="my-4">

        </div>
    </div>


    <div class="container" style="margin-top:10%">
    <?php echo $error; ?>
        <div class="col-10 form-group">
            <form action="#" method="post" class="col">
                <div class="form-group">
                    <label for="email">Adja meg az email címét!</label>
                    <input type="email" class="form-control " placeholder="Email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="email">Adja meg a nevét!</label>
                    <input type="text" class="form-control " placeholder="Név" name="nev" required>
                </div>
                <div class="form-group">
                    <label for="email">Adja meg a jelszót!</label>
                    <input type="password" class="form-control " placeholder="Jelszó" name="pass" required>
                </div>
                <div class="form-group">
                    <label for="email">Adja meg újra a jelszavát!</label>
                    <input type="password" class="form-control " placeholder="Jelszó" name="passm" required>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="hidden" value="0" name="subscr">
                    <input class="form-check-input" type="checkbox" value="1" name="subscr">
                    <label class="form-check-label" for="defaultCheck1">
                        Szeretnék hírleveleket kapni a futamok után
                    </label>
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-lg" style="margin-bottom:15%">Regisztráció</button>
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