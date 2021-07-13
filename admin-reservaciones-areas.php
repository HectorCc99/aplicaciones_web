<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Préstamos de Áreas Deportivas</title>
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
                                <img src="./icons/mail.png" alt="" width="20px">
                                <h2 class="ml-2">osc_basquet@hotmail.com</h2>
                            </div>
                            <div class="text">
                                <img src="./icons/phone.png" alt="" width="18px">
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
                        <a href="index.php" class="nav-item nav-link mr-5"><img src="./icons/home.svg" alt="" width="15px"><span class="ml-2">Inicio</span></a>
                        <a href="admin-menu.php" class="nav-item nav-link mr-5"><img src="./icons/menu.svg" alt="" width="18px"><span class="ml-2">Menú</span></a>
                        <a href="admin-perfil.php" class="nav-item nav-link mr-5"><img src="./icons/user.svg" alt="" width="18px"><span class="ml-2">Perfil</span></a>
                        <a href="home.php" class="nav-item nav-link mr-5"><img src="./icons/logout.png" alt="" width="18px"><span class="ml-2">Cerrar Sesión</span></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->
        <!-- INICIO TABLA-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                        <h1 class="mt-5 mb-3"><strong>Áreas Deportivas</strong></h1>
                        <p style="font-size: 20px; text-transform: uppercase;">Solicitudes de Reservación</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="font-weight-bold">Seleccione una opción:</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <label for="material">Área/Espacio:</label>
                </div>
                <div class="col-lg-4">
                    <select name="area" id="area" class="select">
                        <option>Todas</option>
                        <option>Cancha de Fútbol</option>
                        <option>Cancha de Basketbol</option>
                        <option>Área de Fútbol Américano</option>
                    </select>
                </div>
                <div class="col-lg-2">
                    <label for="fecha">Fecha:</label>
                </div>
                <div class="col-lg-4">
                    <select name="fecha" id="fecha" class="select">
                        <option>06-07-2021</option>
                        <option>07-07-2021</option>
                        <option>08-07-2021</option>                        
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 overflow-auto table-responsive-lg mt-3 mb-3">
                    <table class="table table-hover table-striped table-sm mt-3">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Nombre del Alumno</th>
                            <th scope="col">Espacio</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora de Inicio</th>
                            <th scope="col">Hora de Término</th>
                            <th scope="col">Estatus</th>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Viviana García</td>
                                <td>Canchas de Basketbol</td>
                                <td>07-07-2021</td>
                                <td>12:00</td>
                                <td>14:00</td>
                                <td>
                                    <select name="estatus" id="estatus" class="select">
                                        <option value="0">Aprobada</option>
                                        <option value="1">Rechaza</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Julian Bautista</td>
                                <td>Canchas de Voleilbol</td>
                                <td>07-07-2021</td>
                                <td>11:00</td>
                                <td>13:00</td>
                                <td>
                                    <select name="estatus" id="estatus" class="select">
                                        <option value="0">Aprobada</option>
                                        <option value="1">Rechaza</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- FIN TABLA-->
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
        <a href="#" class="back-to-top"><img src="./icons/arrow-up.png" alt="" width="40px"></a>
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
    </body>
</html>