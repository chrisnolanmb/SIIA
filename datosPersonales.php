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
//echo $user;

$quer_name = "SELECT DISTINCT
a_name AS Nombre

FROM
    inscripcion I
        JOIN
    alumno A ON I.id_alumno = A.matricula
        
        AND id_alumno = '$user'
;";



$query_datos_personales = "SELECT 
    Nombre_materia AS Asignatura,
     Nombre AS Profesor,
	   Creditos, Ciclo, image

FROM
    inscripcion I
        JOIN
    profesor P ON I.id_profesor = P.num_empleado
        JOIN
    alumno A ON I.id_alumno = A.matricula
        JOIN
    alta_materias M ON I.materia = M.id_materia
        JOIN
    mapa_curricular MP ON M.Nomenclatura = MP.Clave
        AND id_alumno = '$user'
;";

$result_query_datos_personales = mysqli_query($conexion, $query_datos_personales) or die("Bad query: $query_datos_personales");

$result_query_name = mysqli_query($conexion, $quer_name) or die("Bad query: $quer_name");

// session_destroy();

while ($row = mysqli_fetch_assoc($result_query_name)) {
  $nombre = $row['Nombre'];
}

// session_destroy();
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
            <a class="nav-link active" href="reinscripcion.php">Reinscripción</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#"><b>Datos personales</b></a>
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

      <div class="col-sm-3">
        <br>
        <h3 style="color: rgba(0, 0, 0, 1.0);">
          Datos personales
        </h3>
        Lic. En Ciencias Físico Matemáticas
      </div>

      <div class="col-sm-3 text-center">

      </div>

      <div class="col-sm-3 text-center">
        <div class="circulo ">

          <!-- <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="image" />
            <input type="submit" name="submit_image" value="UPLOAD" />
          </form> -->
          <?php
          include("db_conn.php");
          $user = $_SESSION['usuario_logged'];
          $query_image = "SELECT image FROM alumno WHERE matricula = '$user'";
          $result_image = $conexion->query($query_image) or die("Bad query: $query_image");
          while ($row = $result_image->fetch_assoc()) {
          ?>
            <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" width="275" style="border-radius: 100%;">
          <?php
          }
          ?>
        </div>
        <?php echo $nombre ?> <br>
        <?php echo $user ?>
      </div>
    </div>
    <br>
    <!-- Seleción de materias -->
    <div class="container">
      <div class="row ">
        <div class="col-sm-6 ">
          <div class="recuadro">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Asignatura</th>
                  <th scope="col">Profesor</th>
                  <th scope="col">Créditos</th>



                </tr>
              </thead>
              <tbody>
                <?php while ($row = mysqli_fetch_object($result_query_datos_personales)) {
                  echo "
                                        <tr>
                                          <td>$row->Asignatura</td>
                                          <td style='overflow:hidden;'>$row->Profesor</td>
                                          <td>$row->Creditos</td>
                                          
                                        </tr>";
                }
                ?>






                <!-- <tr>
                                <td scope="row">Física Moderna</td>
                                <td>10</td>
                              </tr>
                              <tr>
                                <td scope="row">Cálculo Complejo</td>
                                <td>6</td>
                              </tr> -->

              </tbody>
            </table>



          </div>

        </div>


        <div class="col-sm-6" class="recuadro" style="background-color: none;">
          <div class="row justify-content-md-center">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Certificado de bachillerato
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <a href="">Descargar certificado de bachillerato</a>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Constancia de estudios
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Realiza el pago para solicitar constancia de estudios en <b>Control Escolar</b>
                    <button class="enviarActivado">Relizar pago</button>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Credencial estudiantil
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <a href="">Credencial escaneada (inválida sin sellos)</a> <br>
                    Realizar pago para solicitar resposición de credencial física
                  </div>
                </div>
              </div>
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