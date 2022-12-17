<?php
session_start();
include 'db_conn.php';

$usuario = $_POST['matricula'];
$password = $_POST['contrasenia'];


$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password'");

if (mysqli_num_rows($validar_login) > 0) {
    $_SESSION['usuario_logged'] = $usuario;

    // echo '
    //         <script>
    //             // alert("Usuario encontrado!");
    //         </script>
    //     ';
    header("Location: calificaciones.php");
    exit;
} else {
    echo "
            <script> 
                alert('Usuario no encontrado');
                window.location = 'login.php';
            </script>
        ";
    #header('Location : login.html');
    exit;

    echo '';
}
