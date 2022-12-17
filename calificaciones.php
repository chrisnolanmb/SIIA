<?php

include 'db_conn.php';
session_start();
if (!isset($_SESSION['usuario_logged'])) {
  echo '
      <script> 
        alert("You are not logged!");
        window.location.href = "login.php";
      </script>
    ';
  // header("location:login.html");
  session_destroy();
  die();
}

// $conexion = mysqli_connect("localhost", "root", "root", "siia");

$user = $_SESSION['usuario_logged'];


$query_promedio = "SELECT 
ROUND(AVG(Calificacion),2) AS Promedio, COUNT(Calificacion) AS Conteo
FROM
calificaciones C
    JOIN
inscripcion I ON C.alumno_id = I.id_alumno
    JOIN
profesor P ON C.id_profesor = P.num_empleado
    JOIN
alta_materias M ON C.id_materia = M.id_materia
    JOIN
mapa_curricular MP ON M.Clave = MP.Clave
    AND C.alumno_id = '$user'
    AND I.materia = C.id_materia
;";

$result_query_promedio = mysqli_query($conexion, $query_promedio) or die("Bad query: $query_promedio");
// session_destroy();

while($row = mysqli_fetch_assoc($result_query_promedio)){
  $promedio = $row['Promedio'];
  $conteo = $row['Conteo'];
}
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
  <link rel="stylesheet" href="styles/secundario.css">
  <title>siia</title>
</head>

<body style="background-color: #e1e1e1;">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg  navbar-dark" style=" font-family: 'Poppins', sans-serif; position: sticky; top: 0px; padding: 0px;">
    <div class="container-fluid" style="background-color: #30683B; border-radius: 0px 0px 20px 20px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
      <a class="navbar-brand" href="#">
        <img src="img/esiiaSinSombra.png" alt="Bootstrap" width="120">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="border: none;">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#"><b>Calificaciones</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="reinscripcion.php">Reinscripción</a>
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
          Calificaciones
        </h3>



        Lic. En Ciencias Físico Matemáticas
      </div>
      <div class="col-md-auto text-center">
        <br>
        <h2 style="font-size: 20vw; margin: -12px; color: #000;"><?php echo "$promedio" ?></h2>
        Promedio
      </div>
      <div class="col col-lg-2">
        <br>
      </div>
    </div>
    <br>

    <div class="row justify-content-md-center">
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Ciclo <b> 22/23</b>
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Materia</th>
                    <th scope="col">Calificación</th>
                    <th scope="col">Examen</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Física Moderna</th>
                    <td>10</td>
                    <td>Regular</td>
                  </tr>
                  <tr>
                    <th scope="row">Cálculo Complejo</th>
                    <td>6</td>
                    <td style="color: red;">Extra</td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Ciclo <b> 22/22</b>
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Ciclo <b> 21/22</b>
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>