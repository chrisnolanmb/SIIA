<?php
    include 'db_conn.php';

    $matricula = $_POST['matricula'];
    $password = $_POST['contrasenia'];
    
    
    $validar_login = mysqli_query($conexion, "SELECT * FROM alumno WHERE matricula = '$matricula' AND Password = '$password'");

    if(mysqli_num_rows($validar_login) > 0) {
        echo '
            <script>
                alert("Usuario encontrado!");
            </script>
        ';

         header("Location: calificaciones.html"); 
        exit;
        
    }else {
        echo "
            <script> 
                alert('Usuario no encontrado');
                
            </script>
            
        ";
        header('login.php');
            exit;

    }
