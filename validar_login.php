<?php
session_start();
include 'db_conn.php';

$usuario = $_POST['matricula'];
// $user = $_SET['matricula'];
$password = $_POST['contrasenia'];


$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario' OR maestro = '$usuario' AND password = '$password'");

if (mysqli_num_rows($validar_login) > 0 && strlen($user) <= 8) {
    $_SESSION['usuario_logged'] = $usuario;

    // echo '
    //         <script>
    //             // alert("Usuario encontrado!");
    //         </script>
    //     ';
    header("Location: calificaciones.php");
    exit;
} else if(mysqli_num_rows($validar_login) > 0 && strlen($user) >=9){
    echo "
            <script> 
                alert('Aun no esta lista la pagina de profes');
                window.location = 'login.php';
            </script>
        ";
    #header('Location : login.html');
    exit;

    echo '';
}else{
    echo "
            <script> 
                alert('Usuario encontrado!');
                window.location = 'login.php';
            </script>
        ";
    #header('Location : login.html');
    exit;

    echo '';
}
