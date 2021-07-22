<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>ActivFesc</title>
        <!--Bootstrap CSS-->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <!-- CSS Libraries -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
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
                <a href="home.php" class="navbar-brand">A<span>ctiv</span>F<span>esc</span></a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a href="home.php" class="nav-item nav-link">Inicio</a>
                        <a href="deportes.php" class="nav-item nav-link">Deportes</a>
                        <a href="prestamos.php" class="nav-item nav-link">Préstamos</a>
                        <a href="registro.php" class="nav-item nav-link">Registrarse</a>
                        <a href="login.php" class="nav-item nav-link">Iniciar Sesión</a>
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
                <div class="row class-container">
                    <div class="col-lg-4 col-md-6 col-sm-12 class-item filter-1 wow fadeInUp" data-wow-delay="0.0s">
                        <div class="class-wrap">
                            <div class="class-img">
                                <img src="img/full-contact.jpg" alt="Image">
                            </div>
                            <div class="class-text">
                                <div class="class-teacher">
                                    <img src="icons/teacher.svg" alt="Image">
                                    <h3>Eréndira Hernández Rojas</h3>
                                    <a href="login.php">+</a>                                    
                                </div>
                                <h2>Full Contact</h2>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Categoría: </span>Combate</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Horario: </span>Lun, Miér</p>
                                    <p>11:00 - 12:00</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Ubicación: </span>Gimnasio</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Grupo: </span>2145</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 class-item filter-2 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="class-wrap">
                            <div class="class-img">
                                <img src="img/futbol-femenil.jpg" alt="Image">
                            </div>
                            <div class="class-text">
                                <div class="class-teacher">
                                    <img src="icons/teacher.svg" alt="Image">
                                    <h3>Alfredo Pérez Rojas</h3>
                                    <a href="login.php">+</a>
                                </div>
                                <h2>Fútbol Asociación Femenil</h2>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Categoría: </span>Conjunto con Pelota</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Horario: </span>Lun, Miér, Vier</p>
                                    <p>11:00 - 15:00</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Ubicación: </span>Campo de Fútbol</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Grupo: </span>2146</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 class-item filter-3 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="class-wrap">
                            <div class="class-img">
                                <img src="img/ajedrez1.png" alt="Image">
                            </div>
                            <div class="class-text">
                                <div class="class-teacher">
                                    <img src="icons/teacher.svg" alt="Image">
                                    <h3>Teresa Vázquez Hernández</h3>
                                    <a href="login.php">+</a>
                                </div>
                                <h2>Ajedrez</h2>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Categoría: </span>Individual</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Horario: </span>Jue , Vier</p>
                                    <p>13:00 - 15:00</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Ubicación: </span>Club de Ajedrez</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Grupo: </span>2147</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 class-item filter-4 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="class-wrap">
                            <div class="class-img">
                                <img src="img/danza-arabe.jpg" alt="Image">
                            </div>
                            <div class="class-text">
                                <div class="class-teacher">
                                    <img src="icons/teacher.svg" alt="Image">
                                    <h3>Jeymy Nancy Cazares Arellano</h3>
                                    <a href="login.php">+</a>
                                </div>
                                <h2>Danza Árabe</h2>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Categoría: </span>Fitness</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Horario: </span>Mar, Jue</p>
                                    <p>14:00 - 16:00</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Ubicación: </span>Gimnasio</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Grupo: </span>2148</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 class-item filter-5 wow fadeInUp" data-wow-delay="0.8s">
                        <div class="class-wrap">
                            <div class="class-img">
                                <img src="img/activacion-fisica.png" alt="Image">
                            </div>
                            <div class="class-text">
                                <div class="class-teacher">
                                    <img src="icons/teacher.svg" alt="Image">
                                    <h3>Teresa Vázquez Hernández</h3>
                                    <a href="login.php">+</a>
                                </div>
                                <h2>Activación Física</h2>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Categoría: </span>Prog. Int. para Mejorar la Salud</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Horario: </span>Lun - Vier</p>
                                    <p>10:00 - 11:30</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Ubicación: </span>Explanadas y Canchas</p>
                                </div>
                                <div class="class-meta">
                                    <p><span class="font-weight-bold">Grupo: </span>2149</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Finaliza Deportes -->

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