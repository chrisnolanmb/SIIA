<?php
session_start();
if(isset($_SESSION['usuario_logged'])) {
   
    header("location:calificaciones.php");
}
// session_destroy();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/main.css">
    <title>SIIA UMSNH</title>
</head>

<body>
    <div class="fondoLogin">
        <div>
            <img src="img/esiia.png" alt="">
        </div>
        <div class="formLogin">
            <h3>
                Inicio de Sesión
            </h3>
            <form action="validar_login.php" method="POST">
                <label for="matricula">Matrícula</label> <br>
                <input type="text" name="matricula" id="matricula" placeholder="0123456x">
                <label for="contrasenia">Constraseña</label> <br>
                <input type="password" name="contrasenia" id="contrasenia" placeholder="Escribe tu contraseña">
                <input type="submit" value="Ingresar" class="enviar">
                
                
            </form>
            <h4>
                <a href="calificaciones.php">
                    ¿Olvidaste la constraseña?
                </a>
            </h4>
            
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
