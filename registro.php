<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Registro</title>
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
                <a href="index.html" class="navbar-brand">A<span>ctiv</span>F<span>esc</span></a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a href="index.php" class="nav-item nav-link mr-5">Inicio</a>
                        <a href="deportes.php" class="nav-item nav-link mr-5">Deportes</a>
                        <a href="prestamos.php" class="nav-item nav-link mr-5">Préstamos</a>
                        <a href="registro.php" class="nav-item nav-link mr-5">Registro</a>
                        <a href="login.php" class="nav-item nav-link mr-5">Iniciar Sesión</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->
        <!-- Page Header Start 
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Registrate</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Home</a>
                        <a href="">Registrate</a>
                    </div>
                </div>
            </div>
        </div>
        Page Header End -->
        <!-- Registro Start -->
        <div class="registro mt-5">
            <div class="container">
                <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                    <h1>Registro</h1>
                    <p class="mt-2">Por favor ingresa los siguientes datos</p>
                </div>
                <div class="row">
                    <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="registro-form">
                            <div id="success"></div>
                            <form name="registro" id="registro" novalidate="novalidate">
                                <div class="registro-form row">
                                    <div class="col-lg-2">
                                        <label for="nombre" class="col-form-label">Nombre:</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="name" placeholder="Nombre(s)" required="required" data-validation-required-message="Por favor, ingresa tu nombre" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control" id="primer_ap" placeholder="Primer Apellido" required="required" data-validation-required-message="Por favor, ingresa tu apellido" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control" id="segundo_ap" placeholder="Segundo Apellido" required="required" data-validation-required-message="Por favor, ingresa tu apellido" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="registro-form row">
                                    <div class="col-lg-2">
                                        <label for="no_cuenta" class="col-form-label">No. Cuenta:</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="cuenta" placeholder="Número de cuenta" required="required" data-validation-required-message="Por favor, ingresa tu número de cuenta" />
                                        <p class="help-block text-danger"></p> 
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="carrera" class="col-form-label">Carrera:</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <select name="carrera" id="carrera" class="form-control">
                                            <option>Informática</option>
                                            <option>Administración</option>
                                            <option>Contaduría</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="registro-form row">
                                    <div class="col-lg-2">
                                        <label for="correo">Correo:</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="email" class="form-control" id="email" placeholder="Correo electrónico" required="required" data-validation-required-message="Por favor, ingresa tu cuenta de correo" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="telefono">Teléfono:</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control" id="tel" name="tel" placeholder="55-55-55-55-55" required="required" data-validation-required-message="Por favor, ingresa tu teléfono">
                                    </div>
                                </div> 
                                <div class="registro-form row">
                                    <div class="col-lg-2">
                                        <label for="password">Contraseña:</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="password" class="form-control" id="clave" placeholder="Ingrese su contraseña" required="required" data-validation-required-message="Escriba una contraseña" />
                                    <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="repetir-password">Repetir Contraseña:</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="password" class="form-control" id="clave_confirm" placeholder="Confirme su contraseña" required="required" data-validation-required-message="Escriba una contraseña" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="btn">
                                    <button class="btn btn-danger" type="reset" id="cancelar">Cancelar</button>
                                    <button class="btn btn-primary" type="button" id="registrar">Registrarse</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Registro End -->
        <!-- Footer Start -->
        <div class="footer wow fadeIn" data-wow-delay="0.3s">
            <div class="container-fluid">
                <div class="container">
                    <div class="footer-info">
                        <a href="index.html" class="footer-logo mt-0">A<span>ctiv</span>F<span>esc</span></a>
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
