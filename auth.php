<!DOCTYPE html>
<html lang="en">
<link href="D_BLue.svg" rel="icon" type="image/x-icon" />
<link href="D_BLue.svg" rel="shortcut icon" type="image/x-icon" />

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autorizare</title>
</head>

<body>

</body>

</html>
<?php
$login = $_POST['login'];
$pass = $_POST['pass'];
$pass = md5($pass . "QSCOIJWEAKK2scijsj");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `acces_date` WHERE `Login` = '$login' AND `Password` = '$pass'";

$result = $conn->query($sql);
if ($result->num_rows == 1) {
    header('Location: Notificare/index.php');
} else {
    echo '<script>alert("Nu a fost găsit astfel de utilizator!");</script>';

    require "index.php";
}


$conn->close();
