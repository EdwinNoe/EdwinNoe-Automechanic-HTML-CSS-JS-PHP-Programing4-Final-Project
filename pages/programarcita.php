<?php
    require __DIR__ . '/../controllers/citas.php';
    
    $consultaMantenimiento = obtener_servicios_mantenimiento();  
    $mantenimiento = json_decode($consultaMantenimiento, true); 
    
    // echo "<pre>";
    // var_dump($mantenimiento);
    // echo "</pre>";
    
    // echo "<br>";
    
    $consultaReparacion = obtener_servicios_reparacion();  
    $reparacion = json_decode($consultaReparacion, true); 
    
//     echo "<pre>";
//     var_dump($reparacion);
//     echo "</pre>";
// ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/bootstrap-5.3.3-dist/css/custom.css">
    <title>Programar Cita</title>
</head>
<body>
      <header >
        <nav class="navbar navbar-expand-lg navbar_custom ">
            <div class="container-fluid ">
              <a class="navbar-brand" href="../index.html"><img src="../assets/logo.png" alt=""></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.html">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active " href="../index.html#Servicios">Servicios</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active " href="../index.html#Overview">Overview</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="./galeria.html">Galeria y Videos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="./faqs.html"> FAQS </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="./programarcita.php"> Programar Cita </a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link " aria-disabled="true">Disabled</a>
                  </li> -->
                </ul>
              </div>
              <a href="../pages/login.php" style="padding-right: 30px;">
                <button type="button" class="btn btn-outline-tertiary">Login</button>
              </a>
            </div>
          </nav>
      </header>

    <main>
      <section class="mb-3">
          <div>
              <div class="container-fluid galeria-tittle">
                  <div class="row">
                    <h2 class="custom-subrayado mt-3">Agenda tu cita</h1>
                  </div>
              </div>
          </div>
        </section>
        <section class="d-flex align-items-center justify-content-center">
          
          <form action="" class=" agendarform card shadow container p-5 col-12 col-md-8 col-lg-6 mx-auto">
            <h3 class="text-center"> Reservación de Servicios Técnicos y reparacion</h3>  
            <fieldset class="border rounded p-4 ">
                <div class="form-group row mb-3">
                  <label for="inputEmail3" class="col-sm-4 col-form-label">Correo</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Correo o Username" required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 col-md-8 col-lg-6 mx-auto">
                    <label for="fecha" class="form-label">Fecha:</label>
                    <input type="date" id="fecha" name="fecha" class="form-control" required>
                  </div>
                  <div class="col-12 col-md-8 col-lg-6 mx-auto">
                    <label for="appt" class="form-label">Hora de cita:</label>
                    <input type="time" id="appt" name="appt" min="08:00" max="18:00" class="form-control" required>
                  </div>
                </div>
              </fieldset>

              <fieldset class="border rounded p-4 ">
                <div class="form-check">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="mantenimiento"checked>
                      <label class="form-check-label" for="flexRadioDefault1">
                          Servicio de Mantenimiento
                      </label>
                      </div>
                      <div class="form-check">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="reparacion">
                      <label class="form-check-label" for="flexRadioDefault2">
                          Servicio de Reparacion
                      </label>
                </div>

                <div class="" id="mantenimiento">
                    <select class="form-select" aria-label="Default select example" id="servicioMantenimiento">
                      <option ></option>
                      <?php foreach ($mantenimiento as $servicio): ?>
                          <option value="<?php echo $servicio['nombre_servicio']; ?>"
                                  data-descripcion="<?php echo $servicio['descripcion']; ?>"
                                  data-precio="<?php echo $servicio['precio']; ?>">
                              <?php echo $servicio['nombre_servicio']; ?>
                          </option>
                      <?php endforeach; ?>
                    </select>
                </div>

                <div class="d-none" id="reparacion">
                    <select class="form-select" aria-label="Default select example" id="servicioReparacion">
                      <option value=""></option>
                      <?php foreach ($reparacion as $servicio): ?>
                          <option value="<?php echo $servicio['nombre_servicio']; ?>"
                                  data-descripcion="<?php echo $servicio['descripcion']; ?>"
                                  data-precio="<?php echo $servicio['precio']; ?>">
                              <?php echo $servicio['nombre_servicio']; ?>
                          </option>
                      <?php endforeach; ?>
                    </select>
                </div>
              </fieldset>
              <fieldset class="border rounded p-4 ">
                <div class="d-flex flex-column">
                    <p class="descripcion"></p>
                    <p class="precio"></p>
                </div>
              </fieldset>

              <button type="submit" class="btn btn-tertiary w-100">Submit</button>
          </form>
        </section>
    </main>
    <footer class="footer_custom">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
              <li class="nav-item"><a href="../index.html" class="footer_custom-link nav-link px-2">Home</a></li>
              <li class="nav-item"><a href="../index.html#Overview" class="footer_custom-link nav-link px-2">Overview</a></li>
              <li class="nav-item"><a href="./galeria.html" class="footer_custom-link nav-link px-2">Galeria/Videos</a></li>
              <li class="nav-item"><a href="../index.html#Servicios" class="footer_custom-link nav-link px-2">Servicios</a></li>
              <li class="nav-item"><a href="./faqs.html" class="footer_custom-link nav-link px-2">FAQS</a></li>
              <li class="nav-item"><a href="./programarcita.php" class="footer_custom-link nav-link px-2">Programar Cita</a></li>
            </ul>
            <p class="text-center text-muted footer_custom-link mb-0">© 2024 Automechanic, Edwin Argueta 32111584</p>
    </footer>

    <script src="../style/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <script type="module" src="../scripts/programarcita.js"></script>
</body>
</html>
