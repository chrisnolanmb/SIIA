<?php
include 'db_conn.php';

$usuario = $_POST['matricula'];
$password = $_POST['contrasenia'];


$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password'");

if (mysqli_num_rows($validar_login) > 0) {
    echo '
            <script>
                // alert("Usuario encontrado!");
            </script>
        ';
    header("Location: calificaciones.html");
    exit;
} else {
    echo "
            <script> 
                alert('Usuario no encontrado');
                window.location = 'login.html';
            </script>
        ";
    #header('Location : login.html');
    exit;
}
