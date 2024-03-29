<?php
session_start();
if(empty($_SESSION['id_Admin'])) {
    header('location: home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Historial de Préstamos</title>
        <!--Bootstrap CSS-->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <!-- CSS Libraries -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <!-- Top Bar Start -->
        <div class="top-bar d-none d-md-block bg-primary">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top-bar-left">
                            <div class="text">
                                <img src="iconos/mail.png" alt="" width="20px">
                                <h2 class="ml-2">osc_basquet@hotmail.com</h2>
                            </div>
                            <div class="text">
                                <img src="iconos/phone.png" alt="" width="18px">
                                <p></p>
                                <h2>5623 1813</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->
        <!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg bg-primary navbar-dark">
            <div class="container-fluid">
                <a href="index.php" class="navbar-brand">A<span>ctiv</span>F<span>esc</span></a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a href="index.php" class="nav-item nav-link mr-5"><img src="iconos/home.svg" alt="" width="15px"><span class="ml-2">Inicio</span></a>
                        <a href="admin-menu.php" class="nav-item nav-link mr-5"><img src="iconos/menu.svg" alt="" width="18px"><span class="ml-2">Menú</span></a>
                        <a href="admin-perfil.php" class="nav-item nav-link mr-5"><img src="iconos/user.svg" alt="" width="18px"><span class="ml-2">Perfil</span></a>
                        <a href="control/cerrarSesion.php?cerrar=yes" class="nav-item nav-link mr-5"><img src="iconos/logout.png" alt="" width="18px"><span class="ml-2">Cerrar Sesión</span></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->
        <!-- INICIO TABLAS-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                        <h1 class="mt-5 mb-3"><strong>Historial de Préstamos</strong></h1>
                    </div>
                </div>
            </div>
            <!-- INICIO SOLICITUDES-->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="mb-3"><strong>Materiales</strong></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="font-weight-bold">Seleccione una opción:</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label for="material">Material:</label>
                </div>
                <div class="col-lg-4">
                    <select name="materialesS" id="materialesS" class="form-select listaD_materiales">
                        <!--AJAX-->
                    </select>
                </div>
                <div class="col-lg-2">
                    <label for="fecha">Fecha:</label>
                </div>
                <div class="col-lg-4">
                    <select name="fechaM" id="fechaM" class="form-select listD_fechaMat">
                        <!--AJAX-->
                    </select>
                </div>
                <div class="col-lg-4">
                    <button type="button" class="btn btn-primary mostrarTodosMat" name="botonTMat" id="botonTMat">Mostrar todos</button>
                </div>
            </div>
            <div class="row" id="contenedor-historialMateriales">
                <div class="col-lg-12 overflow-auto table-responsive-lg mt-3 mb-3" id="tabla_MaterialesHistorial">
                    <table class="table table-hover table-striped table-sm mt-3">
                        <thead">
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora de Inicio</th>
                            <th scope="col">Hora de Término</th>
                            <th scope="col">Notas</th>
                        </thead>
                        <tbody>
                        <tbody id="tbl-historialMateriales">
                        </tbody>
                    </table>
                </div>
                     <div id="contenedorMensajeMat">
                </div>
            </div>
            <!-- FIN SOLICITUDES-->
            <!-- INICIO ACEPTADAS -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="mb-3 mt-5"><strong>Áreas Deportivas</strong></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="font-weight-bold">Seleccione una opción:</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label for="area">Área/Espacio:</label>
                </div>
                <div class="col-lg-4">
                    <select name="listaAreaS" id="listaAreaS" class="form-select listaD_Areas">
                       <!--AJAX-->
                    </select>
                </div>
                <div class="col-lg-2">
                    <label for="fecha">Fecha:</label>
                </div>
                <div class="col-lg-4">
                    <select name="areaFechas" id="areaFechas" class="form-select listD_fechaArea">

                    </select>
                </div>
                <div class="col-lg-4">
                    <button type="button" class="btn btn-primary mostrarTodosArea" name="botonTArea" id="botonTArea">Mostrar todos</button>
                </div>

            </div>
            <div class="row" id="contenedor-historialEspacio">
                <div class="col-lg-12 overflow-auto table-responsive-lg mt-3 mb-3 mt-3" id="tabla_AreaHistorial">
                    <table class="table table-hover table-striped table-sm">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora de Inicio</th>
                            <th scope="col">Hora de Término</th>
                            <th scope="col">Notas</th>
                        <tbody>
                        <tbody id="tbl-historialAreas">
                        </tbody>
                    </table>
                </div>
                <div id="contenedorMensajeArea">
                </div>
            </div>
            <!-- INICIO ACEPTADAS -->
        </div>
        <!-- FIN TABLAS-->
        <!-- Footer Start -->
        <div class="footer wow fadeIn" data-wow-delay="0.3s">
            <div class="container-fluid">
                <div class="container">
                    <div class="footer-info">
                        <a href="index.php" class="footer-logo mt-0">A<span>ctiv</span>F<span>esc</span></a>
                        <h3>Edificio de Extensión Universitaria, Km. 2.5 Carretera cuautitlán Teoloyucan, San Sebastián Xhala, Cuautitlán Izcalli, Edo. de México. CP. 54714</h3>
                        <div class="footer-menu">
                            <p>5623 1813</p>
                            <p>osc_basquet@hotmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="container copyright mt-0">
                    <div class="row">
                        <div class="col-md-12">
                            <p>&copy; <a href="#"></a>Todos los derechos reservados</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        <a href="#" class="back-to-top"><img src="iconos/arrow-up.png" alt="" width="40px"></a>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/isotope/isotope.pkgd.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <script src="js/historialPrestamo.js"></script>
        <script src="js/historialPrestamosAreasD.js"></script>
    </body>
</html>