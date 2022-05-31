<!DOCTYPE html>
<html lang="en">
<title>Adăugare</title>
<link href="D_BLue.svg" rel="icon" type="image/x-icon" />
<link href="D_BLue.svg" rel="shortcut icon" type="image/x-icon" />

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <style>
    th {
      font-size: 20px;
      text-align: center;
      border-color: RED;
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
  function adauga_afisare()
  { ?>


    <div class="container">
      <div class="row justify-content center">
        <div class="col-12">
          <h1 class="text-center my-5">Adauga</h1>
          <form method="post">

            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">ID</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="coloana1">

              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nume și prenume</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="coloana2">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Funcție</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="coloana3">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Compania</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="coloana4">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Prima parte a concediului</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="coloana5">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Număr de zile prima parte</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="coloana6">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">A doua parte a concediului</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="coloana7">
              </div>
            </div>


            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Număr de zile a doua parte</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="coloana8">
              </div>
            </div>

            <center>
              <button class="btn btn-secondary my-5" name="adauga" type="submit">Adauga</button>
            </center>
          </form>
        </div>
      </div>
    </div>


  <?php
  }

  function adauga()
  {

    require("bloks/connect.php");

    $coloana1 = (int)$_POST['coloana1'];
    $coloana2 = (string)$_POST['coloana2'];
    $coloana3 = (string)$_POST['coloana3'];
    $coloana4 = (string)$_POST['coloana4'];
    $coloana5 = date('Y-m-d', strtotime($_POST['coloana5']));
    $coloana6 = (int)$_POST['coloana6'];
    $coloana7 = date('Y-m-d', strtotime($_POST['coloana7']));
    $coloana8 = (int)$_POST['coloana8'];

    $table = "informatii";

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO informatii (Id, NumePrenume, Functie, Compania, PrimaParteConcediu, NrZilePrimaParte, DouaParteConcediu, NrZileDouaParte)
VALUES ('$coloana1', '$coloana2', '$coloana3', '$coloana4','$coloana5', '$coloana6', '$coloana7', '$coloana8')";

    $result = $conn->query($sql);
    $conn->close();
  }



  if (array_key_exists('adauga', $_POST)) adauga();
  adauga_afisare();

  ?>
</body>

</html>