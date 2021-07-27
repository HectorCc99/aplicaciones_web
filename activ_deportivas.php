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
        <title>Actividades Deportivas</title>
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
        <!-- Inicia Tabla-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                        <h1 class="mt-5 mb-3"><strong>Actividades Deportivas</strong></h1>
                    </div>
                </div>
            </div>
            <div class="row" id="contenedor_actividades">
                <div class="col-lg-12 overflow-auto table-responsive-lg mt-3 mb-3">
                    <table class="table table-hover table-striped table-sm">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Fecha de creacion</th>
                            <th scope="col">Estatus</th>
                            <th scope="col">Opciones</th>
                        </thead>
                        <tbody id="tbl-actividades">

                        </tbody>
                    </table>
                </div>
            </div>
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalAgregar">Agregar Deporte</button>

        </div>
        <!--Fin Tabla-->
        <!--Inicia Modal Editar datos -->
        <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel"><strong>Editar Deporte</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action=""  id="edit-sport">
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-weight-bold">Ingrese los siguientes datos:</p>
                                    <div id="contenedor_act"></div>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="nombre" class="col-form-label">Nombre:</label>
                                </div>
                                <div class="col-sm-9" id="nombre_ac_m">
                                    <!-- ajax-->
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3" >
                                    <label for="descripcion" class="col-form-label">Descripción:</label>
                                </div>
                                <div class="col-sm-9" id="descr_m">

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3" >
                                    <label for="categoria" class="col-form-label">Categoría:</label>
                                </div>
                                <div class="col-sm-9">
                                    <select  name="tipos" id="tipos" class="form-control">
                                        <!-- ajax-->
                                    </select>
                                </div>
                            </div>
                            <!--<div class="form-group row">
                                <div class="col-sm-3" >
                                    <label for="estatus" class="col-form-label">Estatus:</label>
                                </div>
                                <div class="col-sm-9" id="estatus_m">

                                </div>
                            </div>-->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary editar-datos" data-dismiss="modal" id="editar-datos">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Fin Modal Editar datos -->
        <!--Inicia Modal Agregar datos -->
        <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <form action="control/agregar_deporte.php" method="POST" enctype="multipart/form-data" >
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel"><strong>Agregar Deporte</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-weight-bold">Ingrese los siguientes datos:</p>
                                    <input type="hidden" name="id_admin_alta" value="<?php echo $_SESSION['id_Admin']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="nombre" class="col-form-label">Nombre:</label>
                                </div>
                                <div class="col-sm-9" id="nombre_ac_m">
                                    <input type="text" name="Nombre2" id="nombre2" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3" >
                                    <label for="descripcion" class="col-form-label">Descripción:</label>
                                </div>
                                <div class="col-sm-9" id="descr_m">
                                    <textarea name="descripcion2" id="descripcion2" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3" >
                                    <label for="categoria" class="col-form-label">Categoría:</label>
                                </div>
                                <div class="col-sm-9">
                                    <select  name="tipos2" id="tipos2" class="form-control">
                                        <!-- ajax-->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="imagen" class="col-form-label ml-1">Imagen:</label>
                                </div>
                                <div class="col-sm-8 mb-3 mb-sm-0">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="imagen" id="poster" accept="image/png,image/jpeg,image/jpg" required>
                                        <label class="custom-file-label" for="poster" data-browse="Buscar">Seleccione un archivo</label>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary " >Guardar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Fin Modal Agregar datos -->
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
        <script>
            let tabla =true;
        </script>
        <script src="js/main.js"></script>
        <script src="js/actividades_deportivas.js"></script>
    </body>
</html>