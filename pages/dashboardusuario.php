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
        <title>Bienvenido Usuario </title>
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
                                    <a class="nav-link" href="./dashboardusuario-programar_cita.php">Agendar Nueva cita</a>
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
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Bienvenido 
                            <?php
                                echo $_SESSION['nombre']
                            ?>
                        </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Inicio</li>
                        </ol>
                        <div class="w-100 d-flex justify-content-center">
                            <div class="row container">
                                <img src="../assets/logo.png" alt="LOGO AUTOMECHANIC">
                            </div>
                        </div>
                        <div class="w-100 d-flex justify-content-center">

                            <div class="row w-100 justify-content-center">
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">Gestion de Citas</div> 
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="./dashboardusuario-gestion_cita.php">Ver Detalles</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">Agendar Cita</div> 
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="./dashboardusuario-programar_cita.php">Ver Detalles</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">Gestionar tarjetas</div> 
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="./dashboardusuario-gestion_tarjetas.php">Ver Detalles</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                            </div>
                        </div>
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
            
            <!-- modal -->
            <dialog class="dialog d-none">

                <h5 class="modal-title">¡Bienvenido!</h5>

                <div class="modal-body">
                    <p>Tienes una cita pendiente por confirmar</p>
                </div>

                <div class="dialog-boton">
                    <button class="btn btn-success confirmar">Confirmar</button>
                    <button class="btn btn-danger cancelar">Cancelar</button>
                </div>
        
            </dialog>

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
</html>
