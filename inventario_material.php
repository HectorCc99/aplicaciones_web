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
        <title>Inventario de Material</title>
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
        <!-- Inicia Tabla-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                        <h1 class="mt-5 mb-3"><strong>Inventario de Material</strong></h1>
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-lg-12 overflow-auto table-responsive-lg mt-3 mb-3">
                    <table class="table table-hover table-striped table-sm">
                        <thead>
                            <th scope="col">Material</th>
                            <th scope="col">Piezas</th>
                            <th scope="col">Opciones</th>
                        </thead>
                        <tbody id="tbl-materiales">
                            <!--AJAX-->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalAgregar">Agregar Nuevo</button>
                </div>
            </div>
        </div>
        <!--Fin Tabla-->
        <!--Inicia Modal Editar datos -->
        <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel"><strong>Actualizar Material</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action=""  id="">
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-weight-bold">Ingrese los datos:</p>
                                    <div id="contenedor_act"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="material" class="col-form-label">Material:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <input type="hidden" name="id_material" id="id_material" class="form-control ml-1">
                                    <input type="text" name="material" id="material" class="form-control ml-1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2" >
                                    <label for="piezas" class="col-form-label">Piezas:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <input type="number" name="piezas" id="piezas" class="form-control ml-1">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary editar_datos" data-dismiss="modal" id="editar_datos">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Fin Modal Editar datos -->

        <!-- Inicio Modal Agregar -->
        <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel"><strong>Agregar Nuevo Material</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="" autocomplete="off">
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-weight-bold">Ingrese los siguientes datos:</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="material" class="col-form-label ml-1">Material:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <input type="text" name="material" id="material_nuevo" class="form-control ml-1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="piezas" class="col-form-label ml-1">Piezas:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <input type="number" name="piezas" id="piezas_nuevas" class="form-control ml-1">
                                </div>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary agregar_nuevo" data-dismiss="modal" id="agregar_nuevo">Agregar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Modal Agregar -->

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
        <script src="js/materiales.js"></script>
    </body>
</html>