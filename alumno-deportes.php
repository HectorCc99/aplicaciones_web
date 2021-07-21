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
                                <a href="home.php" class="dropdown-item"><span class="font-weight-bold">Cerrar Sesión</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->

        <!-- Inicio de Tarjetas -->
        <div class="container align-item-center mt-5 mb-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                        <h1 class="mt-5">Deportes</h1>
                    </div>
                </div>
            </div>

            <div class="card border-0 align-items-center">
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item btn-primary nav-link ">Todos los deportes</li>
                    <li class="list-group-item btn-primary nav-link">Combate</li>
                    <li class="list-group-item btn-primary nav-link">Colaborativo</li>
                    <li class="list-group-item btn-primary nav-link">Individual</li>
                    <li class="list-group-item btn-primary nav-link">Fitnes</li>
                </ul>
            </div>
        </div>
        <!-- Fin de Tarjetas -->
        <!-- Inicia Deportes -->
        <div class="class">
            <div class="container">
                <div class="row class-container">
                    <div class="col-lg-3 col-md-6 col-sm-12 class-item filter-1 wow fadeInUp" data-wow-delay="0.0s">
                        <div class="class-wrap">
                            <div class="class-img">
                                <img src="img/volibol.jpg" alt="Image">
                            </div>
                            <div class="class-text">
                                <div class="class-teacher">
                                    <img src="icons/teacher.svg" alt="Image">
                                    <h3>Luis Manuel Vivas Amador</h3>
                                    <a href="#" data-toggle="modal" data-target="#modalSolicitud">
                                        <img src="icons/add.svg" alt="Image">
                                    </a>
                                </div>
                                <h2>Volibol</h2>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Categoría: </span>Conjunto con pelota</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Horario: </span>Lun, Miér, Vier</p>
                                    <p>13:00 - 17:00</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Ubicación: </span>Canchas de Volibol</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Grupo: </span>2145</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 class-item filter-2 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="class-wrap">
                            <div class="class-img">
                                <img src="img/futbol-varonil.jpg" alt="Image">
                            </div>
                            <div class="class-text">
                                <div class="class-teacher">
                                    <img src="icons/teacher.svg" alt="Image">
                                    <h3>Dagoberto Riaño Ruíz</h3>
                                    <a href="#" data-toggle="modal" data-target="#modalSolicitud">
                                        <img src="icons/add.svg" alt="Image">
                                    </a>
                                </div>
                                <h2>Fútbol Varonil</h2>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Categoría: </span>Conjunto con pelota</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Horario: </span>Lun - Vier</p>
                                    <p>14:00 - 16:00</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Ubicación: </span>Canchas de Fútbol</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Grupo: </span>2032</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 class-item filter-3 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="class-wrap">
                            <div class="class-img">
                                <img src="img/ajedrez1.png" alt="Image">
                            </div>
                            <div class="class-text">
                                <div class="class-teacher">
                                    <img src="icons/teacher.svg" alt="Image">
                                    <h3>Teresa Vázquez Hernández</h3>
                                    <a href="#" data-toggle="modal" data-target="#modalSolicitud">
                                        <img src="icons/add.svg" alt="Image">
                                    </a>
                                </div>
                                <h2>Ajedrez</h2>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Categoría: </span>Individual</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Horario: </span>Jue , Vier </p>
                                    <p>15:00 - 15:00</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Ubicación: </span>Club de Ajedrez</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Grupo: </span>1548</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 class-item filter-2 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="class-wrap">
                            <div class="class-img">
                                <img src="img/futbol-varonil.jpg" alt="Image">
                            </div>
                            <div class="class-text">
                                <div class="class-teacher">
                                    <img src="icons/teacher.svg" alt="Image">
                                    <h3>Dagoberto Riaño Ruíz</h3>
                                    <a href="#" data-toggle="modal" data-target="#modalSolicitud">
                                        <img src="icons/add.svg" alt="Image">
                                    </a>
                                </div>
                                <h2>Fútbol Femenil</h2>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Categoría: </span>Conjunto con pelota</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Horario: </span>Lun - Vier</p>
                                    <p>14:00 - 16:00</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Ubicación: </span>Canchas de Fútbol</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Grupo: </span>2032</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Finaliza Deportes -->

        <!--Inicia Modal Solicitud-->
        <div class="modal fade" id="modalSolicitud" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel"><strong>Solicitud de Deporte</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="">
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-weight-bold">¿Deseas solicitar tu inscripción a este deporte?</p><br><br>
                                    <div id=""></div>
                                </div>
                            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSolicitar">Solicitar</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!--Fin Modal Solicitud-->

         <!--Inicia Modal Solicitar-->
        <div class="modal fade" id="modalSolicitar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="">
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-weight-bold">De ser aprobada tu solicitud, el deporte aparecerá en tu inicio en la seccion de deportes inscritos</p>
                                    <div id=""></div>
                                </div>
                            </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Fin Modal Solicitar-->

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
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>

</html>