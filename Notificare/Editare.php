<!DOCTYPE html>
<html lang="en">
<title>Editare</title>
<link href="D_BLue.svg" rel="icon" type="image/x-icon" />
<link href="D_BLue.svg" rel="shortcut icon" type="image/x-icon" />

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        th {
            font-size: 20px;
            text-align: center;
        }

        td {
            text-align: center;
        }

        input[type=submit] {
            background-color: #B0A8A6;
            border: none;
            color: white;
            padding: 16px 32px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<!-- body -->

<body class="main-layout">
    <?php require "bloks/header.php" ?>

    <?php

    function produse()
    {
        require("bloks/connect.php");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM informatii";
        $result = $conn->query($sql);
        $n = $result->num_rows;

        if ($result->num_rows > 0) {
            echo "
            <div class='container mt-5'>
            <div class='row d-flex justify-content-center'>
            <div class='col-12'>
            <table class='table'>
            <tr><th style='border: 0px;'></th><th>ID</th><th>Nume și prenume</th><th>Funcție</th><th>Compania</th><th>Prima parte a concediului</th><th>Nr zile prima parte</th><th>A doua parte a concediului</th><th>Nr zile a doua parte</th></tr>";
            while ($row = $result->fetch_assoc()) {

                echo "<tr><td style='border: 0px;'></td><td> " . $row['Id'] . "</td><td> " . $row['NumePrenume'] . "</td><td> " . $row['Functie'] . "</td><td> " . $row['Compania'] . "</td><td>" . $row['PrimaParteConcediu'] . "</td><td> " . $row['NrZilePrimaParte'] . "</td><td> " . $row['DouaParteConcediu'] . "</td><td> " . $row['NrZileDouaParte'] . "</td><td><form action='editform.php' method='post'><input type='hidden' name='id' value=" . $row['Id'] . "><input type='submit' value='Editare'></form></td></tr>";
            }
            echo "</table> </div></div></div>";
        } else echo "<br><center><h1>În baza de date nu sunt înregistrați nimeni<h1></center>";

        $conn->close();
    }
    ?>
    <?php




    function modificare()
    {

        require("bloks/connect.php");
        $coloana1 = (string)$_POST['Id'];
        $coloana2 = (string)$_POST['coloana'];
        $coloana3 = (string)$_POST['valoare'];
        $table = "informatii";

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "UPdate " . $table . " SET " . $coloana2 . " = '" . $coloana3 . "' WHERE Id_Produs = " . $coloana1 . ";";

        $result = $conn->query($sql);
        $conn->close();
    }



    if (array_key_exists('modificare', $_POST)) modificare();
    produse();
    ?>
</body>

</html>