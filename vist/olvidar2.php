<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <Link rel="stylesheet" href="../vista/style/login.css"></Link>


    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center pt-5 mt-5 mr-1">
            <div class="col-md-4 formulario">
                <form action="" method="post">  
                    <div class="form-group text-center pt-3">
                        <h1 class="text-aling">Recuperar contrasenia</h1>
                    </div>
                    <div class="form-group mx-sm-4 pt-3">
                        <input type="email" class="form-control" placeholder="Ingrese su usuario"
                        id="exampleInputEmail1" aria-describedby="emailHelp" name="correo9">
                    </div>
                    <div class="form-group mx-sm-4 pt-3">
                        <input type="submit" class="btn btn-block ingresar" name="btnLog" value = "Recuperar" >
                    </div>
                    <div class="form-group mx-sm-4 text-right">
                        <span class="text-left"><a href="../vista/olvidar.php" class="olvide">Olvide mi contrasenia</a></span>
                    </div>

                 </form>   
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>

<?php
    $correo= $_POST['correo9'];
    echo "el correo es:".$correo."hola";

    $sql="SELECT * FROM alumno WHERE matricula='$correo'";
    $query=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($query);

    echo "<input type="text" name="<?php echo $row['contrasenia']  ?>">";
  }

    ?>
</html>