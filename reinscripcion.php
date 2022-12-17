<?php
session_start();
if(!isset($_SESSION['usuario_logged'])) {
    echo '
      <script> 
        alert("You are not logged!");
      </script>
    ';
    header("location:login.php");
    session_destroy();
    die();
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
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <meta name="theme-color" content="#30683B"/>
    <link rel="stylesheet" href="styles/main.css">
    <title>siia</title>
</head>
<body style="background-color: #e1e1e1;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg  navbar-dark" style=" font-family: 'Poppins', sans-serif; position: sticky; top: 0px; padding: 0px;" >
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

        <!-- Botones para pagar -->

        <!-- <div class="container">
            <div class="row ">
                <div class="col-sm-6 ">
                    <button class="enviarActivado"> Pagar reinscripción </button>
                </div>
                <div class="col-sm-6">
                    <button class="enviarDesactivado"> Aporte escolar <b>PAGADO</b></button>
                </div>
            </div>
        </div>
 -->

        <!-- Seleción de materias -->
        <div class="container">
            <div class="row ">
                <div class="col-sm-6 ">
                    <div class="recuadro">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Selección</th>
                                <th scope="col">Créditos</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td scope="row">Física Moderna</td>
                                <td>10</td>
                                <td style="color: red;">—</td>
                              </tr>
                              <tr>
                                <td scope="row">Cálculo Complejo</td>
                                <td>6</td>
                                <td style="color: red;">—</td>
                              </tr>
                              
                            </tbody>
                        </table>

                        

                    </div>
                    <button class="enviarActivado"> Inscribir</b></button>
                </div>


                <div class="col-sm-6" class="recuadro" style="background-color: none;">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Maerias <br> disponibles</th>
                            <th scope="col">Créditos</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td scope="row">Física Nuclear</td>
                            <td>8</td>
                            <td style="color: green; font-size: 24px;">+</td>
                          </tr>
                          <tr>
                            <td scope="row">Teoría de Números</td>
                            <td>8</td>
                            <td style="color: green; font-size: 24px;">+</td>
                          </tr>
                          <tr>
                            <td scope="row">Cálculo IV</td>
                            <td>12</td>
                            <td style="color: green; font-size: 24px;">+</td>
                          </tr>
                          
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        
                

        

      <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>