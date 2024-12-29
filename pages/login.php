<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/bootstrap-5.3.3-dist/css/custom.css">
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
                  <a class="nav-link active" href="../pages/galeria.html">Galeria y Videos</a>
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
            <a href="#" style="padding-right: 30px;">
              <button type="button" class="btn btn-outline-tertiary">Login</button>
            </a>
          </div>
        </nav>
    </header>
    <main>
      <div class="container">
        <div class="row justify-content-center ">
          <?php
            session_start();  
            if (isset($_SESSION['Mensaje'])) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        ' . $_SESSION['Mensaje'] . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                unset($_SESSION['Mensaje']);
            }else if(isset($_SESSION['MensajeError'])){
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      ' . $_SESSION['MensajeError'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
              unset($_SESSION['MensajeError']);
            }
          ?>
          <div class="col-lg-12 ">
            <form action="../controllers/loginController.php" class="formulario formulario-custom" method="POST">
                <div class="card shadow-lg border-0 rounded-lg mt-3 ">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                    <div class="card-body d-flex flex-column">
                        <form>
                              <div class="form-floating mb-3">
                                  <input required class="form-control" name="inputEmail" id="inputEmail" type="text" placeholder="juan123" />
                                  <label for="inputEmail">Correo</label>
                              </div>
                              <div class="form-floating mb-3">
                                  <input required class="form-control" name="inputPassword" id="inputPassword" type="password" placeholder="Password" />
                                  <label for="inputPassword">Contraseña</label>
                              </div>
                              <!-- <div class="form-check mb-3">
                                  <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                  <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                              </div>  -->
                              <div class="d-flex flex-column mt-4 mb-0">
                                <input type="submit" value="Iniciar sesion" class="btn btn-tertiary ">
                                <!-- <a class="small" href="password.php">Forgot Password?</a> -->
                              </div> 

                              <div class="d-flex flex-column mt-4 mb-0">
                                <!-- <a class="small" href="./dashboardadmin.php">Dashboard</a>
                              </div> -->

                          </form>
                      </div>
                      <div class="card-footer text-center py-3">
                          <div class="small"><a href="./crearusuario.html">No tienes cuenta? Registrate</a></div>
                      </div>
                  </div>
              </form>       
          </div>
        </div>
      </div>
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
    
</body>
<script src="../style/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</html>