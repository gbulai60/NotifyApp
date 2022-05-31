<!DOCTYPE html>
<html lang="en">
<title>Ștergere</title>
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

        label {
            color: black;
            font-weight: bold;
            display: block;
            width: 150px;
            float: left;
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



        $conn->close();
    }
    ?>
    <?php
    function sterge_afisare()
    { ?>



        <div class="container">
            <div class="row justify-content center">
                <div class="col-12">
                    <form method="post">
                        <div class="form-group row my-5">
                            <label class="col-sm-2 col-form-label" style='padding-left: 100px;'>ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Id">
                            </div>
                        </div>
                        <center>
                            <button class="btn btn-secondary my-5" name="sterge" type="submit">Șterge</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>


    <?php
    }

    function sterge()
    {

        require("bloks/connect.php");

        $date1 = (int)$_POST['Id'];
        $table = "informatii";

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "Delete From " . $table . " WHERE Id = " . $date1 . ";";
        $result = $conn->query($sql);
        $conn->close();
    }




    if (array_key_exists('sterge', $_POST)) sterge();
    datele();
    sterge_afisare();
    ?>
</body>

</html>