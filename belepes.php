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

echo file_get_contents('html/head.html');
if (!empty($_SESSION['userid'])){
    echo file_get_contents('html/menu_in.html');
} else {
    echo file_get_contents('html/menu_out.html');
}
echo file_get_contents('html/bejelentkezes.html');
echo file_get_contents('html/footer.html');

?>

