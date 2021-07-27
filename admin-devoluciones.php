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
        <title>Devolución de Materiales</title>
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
                        <h1 class="mt-5 mb-3"><strong>Devolución de Materiales</strong></h1>
                    </div>
                </div>
            </div>
            <div class="row"  id="contenedor-devoluciones">
                <div class="col-lg-12 overflow-auto table-responsive-lg mt-3 mb-3">
                    <table class="table table-hover table-striped table-sm">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Alumno</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Material</th>
                            <th scope="col">Hora Inicio</th>
                            <th scope="col">Hora termino</th>
                            <th scope="col">Estatus</th>
                            <th scope="col">Notas</th>
                            <th scope="col">Editar</th>
                        </thead>
                        <tbody id="tbl-devoluciones">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--Fin Tabla-->
        <!--Inicia Modal Editar datos -->
        <div class="modal fade" id="modalEditarDevolucion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel"><strong>Actualizar Devolución</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        //POR SI SE UTILIZA
                        <input type="text" name="id_admin_alta" value="<?php echo $_SESSION['id_Admin']; ?>">

                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="hidden" name="id_devolucion" id="id_devolucion">
                                    <p class="font-weight-bold">Ingrese los datos faltantes:</p>
                                    <div id="contenedor_devol"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="material" class="col-form-label ml-1">Material:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <input type="text" disabled name="materialEditarDevolucion" id="materialEditarDevolucion" class="form-control ml-1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="alumno" class="col-form-label ml-1">Alumno:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <input type="text" disabled="disabled" name="alumnoEditarDevolucion" id="alumnoEditarDevolucion" class="form-control ml-1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="fecha" disabled="disabled" class="col-form-label ml-1">Fecha:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <input type="date" disabled="disabled" name="fechaEditarDevolucion" id="fechaEditarDevolucion" class="form-control ml-1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="hora_inicio" class="col-form-label ml-1">Hora de inicio:</label>
                                </div>
                                <div class="col-sm-8 mb-3 mb-sm-0">
                                    <input type="time" name="hora_inicioEditarDevolucion" disabled="disabled" id="hora_inicioEditarDevolucion" class="form-control ml-1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="hora_termino" class="col-form-label ml-1">Hora de termino:</label>
                                </div>
                                <div class="col-sm-8 mb-3 mb-sm-0">
                                    <input type="time" name="hora_terminoEditarDevolucion" disabled="disabled" id="hora_terminoEditarDevolucion" class="form-control ml-1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="estatus" class="col-form-label ml-1">Estatus:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <select name="estatusEditarDevolucion" id="estatusEditarDevolucion" class="form-control ml-1">

                                        <option value="3">Devuelto optimamente</option>
                                        <option value="4">Pesimas condiciones (Credencial retenida)</option>
                                        <option value="5">Material repuesto</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="notas" class="col-form-label ml-1">Notas:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <textarea name="notasEditarDevolucion" id="notasEditarDevolucion" cols="30" class="form-control" rows="3"></textarea>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger cancelar-Edicion" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary guardar-EdicionDevolucion" data-dismiss="modal" id="guardar-Edicion">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Fin Modal Editar datos -->

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
       
        <script src="js/devolucionesAdmin.js"></script>
    </body>
</html>
