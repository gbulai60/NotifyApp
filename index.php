<!DOCTYPE html>
<html lang="en">
<title>Autorizare</title>
<link href="D_BLue.svg" rel="icon" type="image/x-icon" />
<link href="D_BLue.svg" rel="shortcut icon" type="image/x-icon" />

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <center>
        <div class="container mt-5">
            <H1>Autorizare</H1>
            <div class="container mt-5">
                <form action="auth.php" method="post">
                    <input type="text" class="form-control" name="login" id="login" placeholder="Introduceți loginul"><br>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Introduceți parola"><br>
                    <input type="submit" value="Autorizare" />
                </form>
            </div>
        </div>
    </center>


</body>

</html>