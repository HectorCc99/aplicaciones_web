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
        <title>Perfil</title>
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
                        <a href="control/cerrarSesion.php?cerrar=yes" class="nav-item nav-link mr-5"><img src="./icons/logout.png" alt="" width="18px"><span class="ml-2">Cerrar Sesión</span></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->


        <!-- Inicia Contenedor Principal -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                        <h1 class="mt-5 mb-3"><strong>Perfil</strong></h1>
                        <p>Actualización de Datos</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-password">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-9">
                                    <h4 class="alert-heading"><strong>Cambiar Contraseña</strong></h4>
                                    <p>Si desea cambiar su contraseña actual, dé clic en el siguiente botón.</p>
                                </div>
                                <div class="col-lg-3">
                                    <button class="btn btn-primary btn-lg btn-block mt-3" data-toggle="modal" data-target="#modalPassword">Cambiar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="perfil">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="mt-3"><strong>Datos Personales:</strong></h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="perfil-form">

                                    <div class="perfil-form row">
                                        <div class="col-lg-2">
                                            <input type="hidden" name="id_ad_perfil" id="id_ad_perfil" class="form-control ml-2" value="<?php echo $_SESSION['id_Admin']; ?>">
                                            <input type="hidden" name="id_usad" id="id_usad" class="form-control ml-2">
                                            <label for="nombre" class="col-form-label">Nombres:</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control mt-2" name="nombreA" id="nombreA" disabled>
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control mt-2" name="primer_apA" id="primer_apA" disabled>
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control mt-2" name="segundo_apA" id="segundo_apA" disabled>
                                        </div>
                                    </div>
                                    <div class="perfil-form row">
                                        <div class="col-lg-2">
                                            <label for="no_trabajador" class="col-form-label">No. Trabajador:</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control mb-2" name="numtrab" id="numtrab" disabled>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="telefono" class="col-form-label">Teléfono:</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control" name="telA" id="telA" disabled>
                                        </div>
                                    </div>
                                    <div class="perfil-form row">
                                        <div class="col-lg-2">
                                            <label for="correo" class="col-form-label">Correo:</label>
                                        </div>
                                        <div class="col-lg-10">
                                            <input type="email" class="form-control" name="correoA" id="correoA" disabled>
                                        </div>
                                    </div>
                                    <div class="perfil-form row">
                                        <!--<button class="btn btn-danger" type="reset" id="cancelar">Cancelar</button>-->
                                        <button class="btn btn-primary btn-lg btn-block mt-3" data-toggle="modal" data-target="#modalActDatosAdmin">Actualizar Información Personal</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Finaliza Contenedor Principal -->


        <!-- Inicia Modal Actualizar Datos-->
        <div class="modal fade" id="modalActDatosAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel"><strong>Actualizar datos personales</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group row">
                            <div class="col-sm-5 mb-3 mb-sm-0">
                                <label for="nombre" class="col-form-label">Nombres:</label>
                            </div>
                            <div class="col-sm-7 mb-3 mb-sm-0">
                                <input type="text" class="form-control mt-2" name="nombreA2" id="nombreA2" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-5 mb-3 mb-sm-0">
                                <label for="nombre" class="col-form-label">Primer apellido:</label>
                            </div>
                            <div class="col-sm-7 mb-3 mb-sm-0">
                                <input type="text" class="form-control mt-2" name="primer_apA2" id="primer_apA2" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-5 mb-3 mb-sm-0">
                                <label for="nombre" class="col-form-label">Segundo apellido:</label>
                            </div>
                            <div class="col-sm-7 mb-3 mb-sm-0">
                                <input type="text" class="form-control mt-2" name="segundo_apA2" id="segundo_apA2" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-5 mb-3 mb-sm-0">
                                <label for="no_trabajador" class="col-form-label">No. Trabajador:</label>
                            </div>
                            <div class="col-sm-7 mb-3 mb-sm-0">
                                <input type="text" class="form-control mb-2" name="numtrab2" id="numtrab2" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-5 mb-3 mb-sm-0">
                                <label for="telefono" class="col-form-label">Teléfono:</label>
                            </div>
                            <div class="col-sm-7 mb-3 mb-sm-0">
                                <input type="text" class="form-control" name="telA2" id="telA2" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-5 mb-3 mb-sm-0">
                                <label for="correo" class="col-form-label">Correo:</label>
                            </div>
                            <div class="col-sm-7 mb-3 mb-sm-0">
                                <input type="email" class="form-control" name="correoA2" id="correoA2" required="required">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary act_datos_admin" data-dismiss="modal">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Finaliza Modal Actualizar datos-->


        <!-- Inicia Modal Cambio de Contraseña-->
        <div class="modal fade" id="modalPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel"><strong>Cambiar Contraseña</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--<form action="" id="update-password" autocomplete="off">-->
                            <div class="form-group row">
                                <div class="col-sm-5 mb-3 mb-sm-0">
                                    <label for="contra-actual" class="col-form-label">Contraseña Actual:</label>
                                </div>
                                <div class="col-sm-7 mb-3 mb-sm-0">
                                    <input type="password" name="pass-actual" id="pass-actual" placeholder="Contraseña Actual" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-5 mb-3 mb-sm-0">
                                    <label for="contra-nueva" class="col-form-label">Contraseña Nueva:</label>
                                </div>
                                <div class="col-sm-7 mb-3 mb-sm-0">
                                    <input type="password" name="pass-nueva" id="pass-nueva" placeholder="Contraseña Nueva" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-5 mb-3 mb-sm-0">
                                    <label for="contra-repetida" class="col-form-label">Repetir Contraseña:</label>
                                </div>
                                <div class="col-sm-7 mb-3 mb-sm-0">
                                    <input type="password" name="pass-repetida" id="pass-repetida" placeholder="Repetir Contraseña" class="form-control">
                                </div>
                            </div>
                        <!--</form>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary cambia_pass" data-dismiss="modal" id="actuaizarPass">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Finaliza Modal Cambio de Contraseña-->
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
        <script src="js/admin_actualiza_datos.js"></script>
    </body>
</html>