<!DOCTYPE html>
<html>
<link href="D_BLue.svg" rel="icon" type="image/x-icon" />
<link href="D_BLue.svg" rel="shortcut icon" type="image/x-icon" />

<head>
  <title>Formular</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
  </style>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    * {
      box-sizing: border-box;
    }

    input[type=text],
    select,
    textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
    }

    input[type=number],
    select,
    textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
    }

    input[type=date],
    select,
    textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
    }

    input[type=submit] {
      background-color: #04AA6D;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }

    .container {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }
  </style>
</head>

<body>

  <br>
  <center>
    <h3>Forma de editare a datelor:</h3>
  </center>
  <?php
  require("bloks/connect.php");
  // Verificarea conexiunii
  if ($conn->connect_error) {
    die("Conexiune esuata: " . $conn->connect_error);
  }
  $sql = "SELECT * FROM informatii WHERE Id=" . $_POST['id'];
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  ?>

  <div class="container">
    <div class="row justify-content center">
      <div class="col-12">
        <div class="container">
          <form action="edit_date.php" method="post">
            <input type="hidden" name="ide" value=<?php echo $row['Id']; ?>>
            <label for="PrimaParteConcediu">Prima parte a concediului</label>
            <input type="date" id="prima_data" name="prima_data" value=<?php echo $row['PrimaParteConcediu']; ?>>
            <label for="NrZilePrimaParte">Număr de zile prima parte</label>
            <input type="number" id="zileprimaparte" name="zileprimaparte" value=<?php echo $row['NrZilePrimaParte']; ?>>

            <label for="DouaParteConcediu">A doua parte a concediului</label><br>
            <input type="date" id="a_doua_data" name="a_doua_data" value=<?php echo $row['DouaParteConcediu']; ?>>

            <label for="NrZileDouaParte">Număr de zile a doua parte</label><br>
            <input type="number" id="zileadouaparte" name="zileadouaparte" value=<?php echo $row['NrZileDouaParte']; ?>><br><br>

            <center><input type="submit" value="Modifica"></center>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>