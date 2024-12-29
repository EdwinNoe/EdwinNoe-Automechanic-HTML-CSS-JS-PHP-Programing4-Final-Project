<?php
    session_start();
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
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Programar Cita </title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../style/bootstrap-5.3.3-dist/dashboard.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../style/bootstrap-5.3.3-dist/dashboardcustom.css">

        <!-- jquery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    </head>
    <body class="sb-nav-fixed">


        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">Automechanic</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> -->
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <!-- <li><a class="dropdown-item" href="#!">Configuraciones</a></li> -->
                        <li><a class="dropdown-item" href="./login.php">Log out </a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <!-- php por si acaso  -->
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Dashbtotoard -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <!-- Nav horizontal -->
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="./dashboardusuario.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Inicio
                            </a>
                            
                            <div class="sb-sidenav-menu-heading">Citas y Pagos</div>

                            <!-- Citas -->
                            <a class="nav-link collapsed" href="./dashboardusuario-gestion_cita.php" data-bs-toggle="collapse" data-bs-target="#collapseCitas" aria-expanded="false" aria-controls="collapseCitas">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Gestionar citas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseCitas" aria-labelledby="headingCitas" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="./dashboardusuario-gestion_cita.php">Gestion de citas</a>
                                    <a class="nav-link" href="#">Agendar Nueva cita</a>
                                </nav>
                            </div>

                            <!-- Pagos -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePagos" aria-expanded="false" aria-controls="collapsePagos">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pagos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePagos" aria-labelledby="headingPagos" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="./dashboardusuario-gestion_tarjetas.php">Gestion de Tarjetas</a>
                                   
                                    <!-- <a class="nav-link" href="layout-sidenav-light.php">Historial de Facturas</a> -->
                                </nav>
                            </div>

                            <div class="sb-sidenav-menu-heading">Usuario</div>
                            <a class="nav-link" href="layout-static.php">Configuraciones</a>
                            <a class="nav-link" href="layout-static.php">Logout</a>

                        </div>
                        <div class="sb-sidenav-footer">
                            <div class="small">Logged in as:

                            </div>
                            Start Bootstrap
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
<!-- Content -->
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Programar Cita  </h1>
                        <form action="" class=" agendarform card shadow container p-5 col-12 col-md-8 col-lg-6 mx-auto">
                            <h3 class="text-center"> Reservación de Servicios Técnicos y reparacion</h3>  
                            <fieldset class="border rounded p-4 ">
                                <div class="form-group row mb-3">


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

                            <button type="submit" class="btn btn-primary w-100">Programar Cita</button>
                        </form>
                            
                        </div>
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            

        </div>
        
       
        <script src="../scripts/dashboard2.js"></script>
        <script type="module" src="../scripts/dashboard.js"></script>
    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../scripts/dashboard1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <!-- <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        
        <script type="module" src="../scripts/dasboardusuario-gestion_programar_cita.js"></script>
</html>
