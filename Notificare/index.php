<!DOCTYPE html>
<html lang="en">
<title>Concedii</title>
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
    </style>
</head>
<!-- body -->

<body class="main-layout">

    <?php require "bloks/header.php" ?>
    <?php

    function datele()
    {
        require("bloks/connect.php");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM informatii";
        $result = $conn->query($sql);
        $n = $result->num_rows;

        require("bloks/table.php");

        $conn->close();
    }

    datele();


    ?>
</body>

</html>