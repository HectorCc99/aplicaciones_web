<?php
session_start();
if (isset($_SESSION['id_usuario']) || isset($_SESSION['id_Admin'])) {
    if (isset($_SESSION['id_Admin'])) {
        header('location: index.php');
    } else if (isset($_SESSION['id_usuario'])) {
        header('location: indexus.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inicio de Sesión</title>
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
        body {
            background: #002B7A;
            background: linear-gradient(to right, #002B7A, #D59F0F);
        }
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


    <div class="contenedorLogin">
        <div class="container w-75 loginDiv rounded shadow">
            <div class="row align-items-stretch">
                <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
                </div>
                <div class="col bg-white p-5 rounded-end">
                    <div class="text-end">
                        <button id="regresarbtn" onclick="location.href='home.php'"></button>
                        <img src="./img/escudo-unam.png" width="70px" align="right">
                    </div>

                    <h2 class="fw-bold text-center py-5"><strong>Bienvenid@</strong></h2>

                    <!---LOGIN-->



                    <div class="mb-4">
                        <!--DATOS-->
                        <label for="email" class="form-label">Correo Electrónico:</label>
                        <input type="email" class="form-control" name="correoT" id="correoT" value="" onkeyup="javascript:this.value=this.value.toLowerCase();" required="required">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" name="contraseniaT" id="contraseniaT" required="required">
                    </div>
                    <div class="mb-4 form-check">
                    </div>
                    <div class="botones">
                        <center><button type="submit" class="btn btn-primary iniciar_sesion">Iniciar Sesión</button></center>
                    </div>
                    <div class="my-3">
                        <span>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></span><br>

                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- Footer Start -->
    <div class="footer wow fadeIn" data-wow-delay="0.3s">
        <div class="container-fluid">
            <div class="container">
                <div class="footer-info">
                    <a href="home.php" class="footer-logo mt-0">A<span>ctiv</span>F<span>esc</span></a>
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
    <script src="js/login.js"></script>
</body>

</html>