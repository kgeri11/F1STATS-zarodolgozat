<?php
session_start();
session_unset('nev');
session_destroy();
header('Location: index.php');