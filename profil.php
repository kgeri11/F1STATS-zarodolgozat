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
$email = $conn->real_escape_string($_POST['email']);
$pwd = $conn->real_escape_string($_POST['pass']);
$npwd = $conn->real_escape_string($_POST['passn']);
$sub = $conn->real_escape_string($_POST['subscr']);




    $errors = array();
    $true = true;

    $sql = "SELECT * FROM user 
        WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

   

    if ($pwd==$npwd) {
        $true = false;
        $error ='<div><h3 class="text-danger text-center">Nem sikerült módosítani az adatait!</h3></div>';
    } 
    if ($true) 
    {                
        $pwdHash = hash('sha512', $npwd);
        $pwdHash = password_hash($pwdHash, PASSWORD_DEFAULT);
        $sql = "UPDATE user SET  pwd='$pwdHash',subscription='$sub' WHERE email='$email';";
        mysqli_query($conn, $sql);
        echo '<script> alert(\'Sikeresen módosította az adatait!\')</script>';
    } else 
    {
        echo '<script> alert(\'Nem sikerült módosítani az adatait!\')</script>';
    }
}
$conn -> close();


echo file_get_contents('html/head.html');
echo file_get_contents('html/menu_in.html');
echo file_get_contents('html/profil.html');
echo $error;
echo file_get_contents('html/footer.html');