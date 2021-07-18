<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Documentación de Alumnos</title>
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
        <!-- Inicia Tabla-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                        <h1 class="mt-5 mb-3"><strong>Documentación</strong></h1>
                        <p style="font-size: 20px; text-transform: uppercase;">Alumnos</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="mb-3"><strong>Pendientes por revisar</strong></h2>
                    <div id="id_usuario">

                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-lg-12 overflow-auto table-responsive-lg mt-3 mb-3" id="contenedor_tabla">
                    <table class="table table-hover table-striped table-sm">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">No. de Cuenta</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Carrera</th>
                            <th scope="col">Documentación</th>
                        </thead>
                        <tbody id="tabla_pendientes">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--Fin Tabla-->

        <!--Tabla de revisados-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="mb-3"><strong>Revisada</strong></h2>
                </div>
            </div>
            <div class="row" >
                <div class="col-lg-12 overflow-auto table-responsive-lg mt-3 mb-3" id="contenedor_tabla2">
                    <table class="table table-hover table-striped table-sm">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">No. de Cuenta</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Carrera</th>
                            <th scope="col">Fecha de Envío</th>
                            <th scope="col">Documentación</th>
                        </thead>
                        <tbody id="tabla_aceptados">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--Fin Tabla de revisados-->
        
        <!--Inicia Modal Pendientes -->
        <div class="modal fade" id="modalPendientes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel"><strong>Documentación</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="contenido_modal">
                       <!--AJax-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary editar-datos" data-dismiss="modal" id="">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Fin Modal Pendientes -->

        <!--Fin Modal Revisados -->
        <div class="modal fade" id="modalRevisados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel"><strong>Documentación</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action=""  id="">
                            <div class="form-group row">
                                <div class="col-sm-5 mb-3 mb-sm-0">
                                    <label for="tira_materias" class="col-form-label">Tira de materias:</label>
                                </div>
                                <div class="col-sm-5 mb-3 mb-sm-0">
                                    <label for="tira_materias" class="col-form-label">tira_de_materias.pdf</label>
                                </div>
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <img src="./icons/check.svg" alt="..." width="24px">
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-5 mb-3 mb-sm-0">
                                    <label for="seguro_estudiante" class="col-form-label ml-1">Seguro de estudiante:</label>
                                </div>
                                <div class="col-sm-5 mb-3 mb-sm-0">
                                    <a href="#"><label for="seguro_estudiante" class="col-form-label ml-1">seguro_de_estudiante.pdf</label></a>
                                </div>
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <img src="./icons/cross.svg" alt="..." width="24px">
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-5 mb-3 mb-sm-0">
                                    <label for="notas" class="col-form-label ml-1">Notas:</label>
                                </div>
                                <div class="col-sm-7 mb-3 mb-sm-0">
                                    <textarea name="notas" id="notas" cols="30" class="form-control" rows="3">Documento ilegible</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-5 mb-3 mb-sm-0">
                                    <label for="seguro_axxa" class="col-form-label ml-1">Seguro Axxa:</label>
                                </div>
                                <div class="col-sm-5 mb-3 mb-sm-0">
                                    <label for="seguro_axxa" class="col-form-label ml-1">seguro_axxa.pdf</label>
                                </div>
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <img src="./icons/check.svg" alt="..." width="24px">
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-5 mb-3 mb-sm-0">
                                    <label for="credencial" class="col-form-label ml-1">Credencial escolar:</label>
                                </div>
                                <div class="col-sm-5 mb-3 mb-sm-0">
                                    <label for="credencial" class="col-form-label ml-1">credencial.pdf</label>
                                </div>
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <img src="./icons/check.svg" alt="..." width="24px">
                                </div>                                
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Fin Modal Revisados -->

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
        <!--incluimos las funciones necesarias para esta pagina-->
        <script src="js/documentacion-alumnos.js"></script>
    </body>
</html>