<?php

include 'db_conn.php';
session_start();
if (!isset($_SESSION['usuario_logged'])) {
  echo '
      <script> 
        alert("You are not logged!");
      </script>
    ';
  header("location:login.php");
  session_destroy();
  die();
}

$user = $_SESSION['usuario_logged'];

$query_materias_disponibles = "SELECT 
Nomenclatura, Ciclo, Nombre_materia, Requisitos, Nombre, Creditos
FROM
alta_materias A
    JOIN
mapa_curricular MP ON MP.Clave = A.Nomenclatura
    JOIN
profesor P ON P.num_empleado = A.id_profesor
    JOIN
inscripcion I ON A.id_materia = I.Materia
    AND id_alumno = '$user'


;";

// session_destroy();
$result_materias_disponibles = mysqli_query($conexion, $query_materias_disponibles) or die("Bad query: $query_materias_disponibles");

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
  <meta name="theme-color" content="#30683B" />
  <link rel="stylesheet" href="styles/main.css">
  <title>siia</title>
</head>

<body style="background-color: #e1e1e1;">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg  navbar-dark" style=" font-family: 'Poppins', sans-serif; position: sticky; top: 0px; padding: 0px;">
    <div class="container-fluid" style="background-color: #30683B; border-radius: 0px 0px 20px 20px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
      <a class="navbar-brand" href="calificaciones.php">
        <img src="img/esiiaSinSombra.png" alt="Bootstrap" width="120">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="border: none;">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="calificaciones.php">Calificaciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#"><b>Reinscripción</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="datosPersonales.php">Datos personales</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="cerrarSesion.php">Cerrar sesion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#"><br></a>
          </li>

        </ul>
      </div>
    </div>
  </nav>


  <!-- Grid principal -->
  <div class="container" style="font-family: 'Poppins', sans-serif;">

    <div class="row justify-content-m-center" style="color: rgba(0, 0, 0, 0.8);">
      <div class="col col-m-2 ">
        <br>
        <h3 style="color: rgba(0, 0, 0, 1.0);">
          Reinscripción
        </h3>
        Lic. En Ciencias Físico Matemáticas
      </div>
      <div class="col-md-auto text-center">
        <br>
        <h2 style="font-size: 18vw; margin: -12px; color: #000;">23/23</h2>
        Ciclo escolar
      </div>
      <div class="col col-lg-2">
        <br>
      </div>
    </div>
    <br>


    <div class="container">

      <div class="row ">
        <div class="col-sm-6 ">
          <div class="recuadro">
            <div class="wrapper">

              <div class="list" style="padding: 16px;">
                <h3>Materias selecionadas:</h3>
                <ul class="done" style="list-style-image: url('img/minus.png');">
                </ul>
              </div>

            </div>



          </div>
          <button onclick="inscribir()" class="enviarActivado"> Inscribir</b></button>
        </div>
        <div class="col-sm-6" class="recuadro" style="background-color: none;">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
          <div class="list" style="margin: 16px;">
            <h3>Materias aprobadas:</h3>
            <ul class="todo" style="list-style-image: url('img/plus.png');">

              <?php
              $i = 1;
              while ($row = mysqli_fetch_object($result_materias_disponibles)) {
                echo "
                                          <li name='test'>$row->Nombre_materia </li>
                                        ";
                $i++;
              }
              ?>
              <!-- <li>Calculo</li>
              <li>Álgebra</li>
              <li>Física Nuclear</li>
              <li>Optica</li>
              <li>Laboratorio</li>
              <li>Didáctica</li> -->
            </ul>
          </div>

        </div>

      </div>
    </div>





    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="lista.js"></script>
</body>

</html>