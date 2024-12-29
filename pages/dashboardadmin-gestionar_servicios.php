<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gestion de Servicios Admin </title>
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
                            <a class="nav-link" href="./dashboardadmin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Inicio
                            </a>
                            
                            <div class="sb-sidenav-menu-heading">Citas y Servicios</div>

                            <!-- Citas -->
                            <a class="nav-link collapsed" href="./dashboardusuario-gestion_cita.php" data-bs-toggle="collapse" data-bs-target="#collapseCitas" aria-expanded="false" aria-controls="collapseCitas">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Gestionar Citas Y Servicios
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            
                            <div class="collapse" id="collapseCitas" aria-labelledby="headingCitas" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="./dashboardadmin-gestion_cita.php">Gestion de citas</a>
    
                                    <a class="nav-link" href="./dashboardadmin-ver-citas.php">Ver citas</a>
                                </nav>
                            </div>

                            <!-- Pagos -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePagos" aria-expanded="false" aria-controls="collapsePagos">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Gestion de servicio
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePagos" aria-labelledby="headingPagos" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="./dashboardadmin-gestionar_servicios.php">Agregar Servicios</a>
                                </nav>
                            </div>

                            <div class="sb-sidenav-menu-heading">Usuario</div>
                            <!-- <a class="nav-link" href="layout-static.php">Configuraciones</a> -->
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


<!-- Content -->
            <div id="layoutSidenav_content">
                <main>

                    <h1>Gestion de Servicios</h1>

                    <div class="container mt-5">
                        <h2 class="text-center">Agregar un Servicio Nuevo</h2>
                        <form id="serviceForm">
                            <div class="mb-3">
                                <label for="serviceType" class="form-label">Tipo de Servicio</label>
                                <select class="form-select" id="serviceType" required>
                                    <option value="">Escoge una opción</option>
                                    <option value="reparacion_vehiculo">Reparación de Vehículo</option>
                                    <option value="servicio_mantenimiento">Servicio de Mantenimiento</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="serviceName" class="form-label">Nombre del Servicio</label>
                                <input type="text" class="form-control" id="serviceName" placeholder="Ingrese el nombre del servicio" required>
                            </div>
                            <div class="mb-3">
                                <label for="serviceDescription" class="form-label">Descripción</label>
                                <textarea class="form-control" id="serviceDescription" rows="3" placeholder="Describe el servicio" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="servicePrice" class="form-label">Precio</label>
                                <input type="number" class="form-control" id="servicePrice" placeholder="Ingrese el precio en LPS" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                        <div class="mt-4" id="output"></div>
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
<!-- Content -->
        </div>
        
       
        <script src="../scripts/dashboard2.js"></script>
    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../scripts/dashboard1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <!-- <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    
    <script src="../scripts/dashboardusuario-gestionar_servicios.js"></script>

</html>
