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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $conn->real_escape_string($_POST['nev']);
    $pwd = $conn->real_escape_string($_POST['pass']);
    $pwdc = $conn->real_escape_string($_POST['passm']);
    $email = $conn->real_escape_string($_POST['email']);
    $subscription = $conn->real_escape_string($_POST['subscr']);
    $sql = "UPDATE user (email, pwd, name, subscription) VALUES (?, ?, ?, ?)";

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
                $error = '<div><h3 class="text-danger text-center">Sikertelen adatmódosítás!</h3></div> <br> ';
            } else {
                $error = '<div><h3 class="text-success text-center">Sikeresen módosította az adatait!</h3></div> <br> ';
            }
            $stmt->close();
        } else {
            $error = $conn->error;
        }
    }
}
$conn -> close();


echo file_get_contents('html/head.html');
echo file_get_contents('html/menu_in.html');
echo $error;
echo file_get_contents('html/profil.html');
echo file_get_contents('html/footer.html');