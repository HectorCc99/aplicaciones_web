<?php
session_start();
if(empty($_SESSION['id_usuario'])) {
    header('location: home.php');
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Deportes</title>
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
        <style>

        </style>
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
                <a href="indexus.php" class="navbar-brand">A<span>ctiv</span>F<span>esc</span></a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a href="indexus.php" class="nav-item nav-link mr-5"><img src="./icons/home.svg" alt="" width="24px"></a>
                        <a href="alumno-inicio.php" class="nav-item nav-link mr-5">Inicio</a>
                        <a href="alumno-deportes.php" class="nav-item nav-link mr-5">Deportes</a>
                        <a href="alumno-prestamos.php" class="nav-item nav-link mr-5">Préstamos</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Cuenta</a>
                            <div class="dropdown-menu">
                                <a href="alumno-perfil.php" class="dropdown-item"><span class="font-weight-bold">Mi Perfil</span></a>
                                <a href="control/cerrarSesion.php?cerrar=yes" class="dropdown-item"><span class="font-weight-bold">Cerrar Sesión</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->
        <!-- Inicia Deportes -->
        <div class="class mt-5">
            <div class="container">
                <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                    <p  class="mt-3">Nuestros</p>    
                    <h1>Deportes</h1>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul id="class-filter">
                            <li data-filter="*" class="filter-active">Todos los deportes</li>
                            <li data-filter=".filter-1">Combate</li>
                            <li data-filter=".filter-2">Conjunto con Pelota</li>
                            <li data-filter=".filter-3">Individuales</li>
                            <li data-filter=".filter-4">Fitness</li>
                            <li data-filter=".filter-5">Para Mejorar la Salud</li>
                        </ul>
                    </div>
                </div>
                <div class="row " id="Deportes">

                </div>
            </div>
        </div>
        <!-- Finaliza Deportes -->

        <!--Inicia Modal Solicitud-->
        <div class="modal fade" id="modalSolicitud" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel"><strong>Solicitud a Deporte</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="">
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>¿Deseas solicitar tu inscripción a este deporte?</p>
                                    <input type="hidden" name="id_grupo_select" id="id_grupo_select">
                                    <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION['id_usuario']; ?>">
                                    <input type="hidden" name="semestre" id="semestre" >
                                </div>
                            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-primary  solicitar" data-dismiss="modal">Sí</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!--Fin Modal Solicitud-->

        <!-- Footer Start -->
        <div class="footer wow fadeIn" data-wow-delay="0.3s">
            <div class="container-fluid">
                <div class="container">
                    <div class="footer-info">
                        <a href="indexus.php" class="footer-logo mt-0">A<span>ctiv</span>F<span>esc</span></a>
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
        <script >
            let tabla=false;
            let deportes=true;
            let cd=false;
        </script>
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <script src="js/actividades_deportivas.js"></script>

    </body>

</html>