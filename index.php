<?php
session_start();

echo file_get_contents('html/head.html');
if (!empty($_SESSION['userid'])){
    echo file_get_contents('html/menu_in.html');
} else {
    echo file_get_contents('html/menu_out.html');
}
echo file_get_contents('html/fooldal.html');
echo file_get_contents('html/footer.html');


