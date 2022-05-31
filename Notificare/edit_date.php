<?php
require("bloks/connect.php");

$now = $now = new DateTime();


// Verificarea conexiunii
if ($conn->connect_error) {
    die("Conexiune esuata: " . $conn->connect_error);
}
$date1 = new DateTime(date('Y-m-d', strtotime($_POST['prima_data'])));
$date2 = new DateTime(date('Y-m-d', strtotime($_POST['a_doua_data'])));
$zileprimaparte = $_POST['zileprimaparte'];
$zileadouaparte = $_POST['zileadouaparte'];
$id = $_POST['ide'];
if ($date1 >= $now && $date2 >= $now && $zileprimaparte > 0 && $zileadouaparte > 0) {
    $Prima_data = date('Y-m-d', strtotime($_POST['prima_data']));
    $A_doua_data = date('Y-m-d', strtotime($_POST['a_doua_data']));
    $sql = "UPDATE informatii SET PrimaParteConcediu='$Prima_data',NrZilePrimaParte='$zileprimaparte',DouaParteConcediu='$A_doua_data',NrZileDouaParte='$zileadouaparte' WHERE Id=$id";
} else if ($date1 >= $now  && $zileprimaparte > 0) {
    $Prima_data = date('Y-m-d', strtotime($_POST['prima_data']));
    $A_doua_data = date('Y-m-d', strtotime($_POST['a_doua_data']));
    $sql = "UPDATE informatii SET PrimaParteConcediu='$Prima_data',NrZilePrimaParte='$zileprimaparte' WHERE Id=$id";
} else if ($date2 >= $now  && $zileadouaparte > 0) {
    $Prima_data = date('Y-m-d', strtotime($_POST['prima_data']));
    $A_doua_data = date('Y-m-d', strtotime($_POST['a_doua_data']));
    $sql = "UPDATE informatii SET DouaParteConcediu='$A_doua_data',NrZileDouaParte='$zileadouaparte' WHERE Id=$id";
} else if ($date2 >= $now) {
    $A_doua_data = date('Y-m-d', strtotime($_POST['a_doua_data']));
    $sql = "UPDATE informatii SET DouaParteConcediu='$A_doua_data' WHERE Id=$id";
} else if ($date1 >= $now) {
    $Prima_data = date('Y-m-d', strtotime($_POST['prima_data']));
    $sql = "UPDATE informatii SET DouaParteConcediu='$Prima_data' WHERE Id=$id";
} else {
    echo '<script> alert("Eroare la modificarea datelor. Verificați corectitudinea datelor introduse! ")</script>';
    require_once(__DIR__ . '/index.php');
}

if ($conn->query($sql) === TRUE) {

    require_once(__DIR__ . '/editare.php');
} else {
    echo '<script> alert("Eroare la modificarea datelor ")</script>';
    require_once(__DIR__ . '/index.php');
}
$conn->close();
