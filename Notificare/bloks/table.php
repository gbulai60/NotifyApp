<?php
if ($result->num_rows > 0) {
    echo "
          <div class='container mt-5'>
          <div class='row d-flex justify-content-center'>
          <div class='col-12'>
          <table class='table'>
          <tr><th style='border: 0px;'></th><th>ID</th><th>Nume și prenume</th><th>Funcție</th><th>Compania</th><th>Prima parte a concediului</th><th>Nr zile prima parte</th><th>A doua parte a concediului</th><th>Nr zile a doua parte</th></tr>";
    while ($row = $result->fetch_assoc()) {

        echo "<tr><td style='border: 0px;'></td><td> " . $row['Id'] . "</td><td> " . $row['NumePrenume'] . "</td><td> " . $row['Functie'] . "</td><td> " . $row['Compania'] . "</td><td>" . $row['PrimaParteConcediu'] . "</td><td> " . $row['NrZilePrimaParte'] . "</td><td> " . $row['DouaParteConcediu'] . "</td><td> " . $row['NrZileDouaParte'] . "</td></tr>";
    }
    echo "</table> </div></div></div>";
} else echo "<br><center><h1>Nu sunt date</h1></center>";
