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
    <title>Inicio</title>
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


    <!--recuperamos el id por sesiones, esta pendiente la sesion que trairia el id del usuario el codigo php iria en el value-->

    <!-- Inicia Tarjetas -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                    <h1 class="mt-5 mb-3"><strong>Bienvenid@</strong></h1>
                </div>
            </div>
            <div class="alert alert-warning" role="alert"  style="width: 100%" id="alertMensajeInicio" >
                ¡Para poder inscribir un deporte primero debes subir toda tu documentación!
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="card mb-4 wow fadeInRight animated">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <img src="./icons/doc.svg" alt="" width="100px">
                            </div>
                            <div class="col-lg-9">
                                <h5 class="card-title font-weight-bold">Subir Documentación</h5>
                                <p class="card-text text-muted">En este apartado sube los documentos solicitados en formato PDF.</p>
                                <a href="#" data-toggle="modal" data-target="#modalDocumentacion">
                                    <button class="btn btn-primary">Subir</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card mb-4 wow fadeInRight animated">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <img src="./icons/check.svg" alt="" width="100px">
                            </div>
                            <div class="col-lg-9">
                                <h5 class="card-title font-weight-bold">Estatus de Documentos</h5>
                                <p class="card-text text-muted">Consulta aquí el estatus de tu documentación enviada.</p>
                                <a href="#" data-toggle="modal" data-target="#modalConsulta">
                                    <button class="btn btn-primary">Ver</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Finaliza Tarjetas -->


    <!-- Inicia Deportes Inscritos -->
    <div class="class">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="mb-4 text-center"><strong>Deportes Inscritos</strong></h2>
                </div>
            </div>

            <div class="row " id="contenedorInscripActuales">
             <!--AJAX-->
            </div>
        </div>
    </div>
    <!-- Finaliza Deportes Inscritos -->


    <!-- Inicia Tabla Historial de Deportes -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="mt-5 mb-3"><strong>Historial de Deportes Inscritos Anteriormente</strong></h3>
            </div>
        </div>
        <div class="row" id="contenedorhistorial">
            <div class="col-lg-12 overflow-auto table-responsive-lg mt-3 mb-3">
                <table class="table table-hover table-striped table-sm mt-3">
                    <thead>
                        <th scope="col">#</th>
                        <th scope="col">Deporte</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Grupo</th>
                        <th scope="col">Semestre</th>
                    </thead>
                    <tbody id="tablahistorialinscripciones">
                        <!--ajax-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Finaliza Tabla Historial de Deportes -->
    <!-- Inicia Modal Subir Documentación -->
    <div class="modal fade" id="modalDocumentacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Subir Documentación</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="./control/subir_documentos.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <p>En cada apartado selecciona el documento que se te solicita. <span class="font-weight-bold">(Nota: En certificados médicos no se aceptarán de similares ni particulares)</span></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <input type="hidden" name="id_usuario" id="id_usuario" class="form-control ml-2" value="<?php echo $_SESSION['id_usuario']; ?>">
                                <input type="text" name="semestre" id="semestre" value="<?php echo "2021-1"; ?>">
                                <label for="tira" class="col-form-label">Tira de Materias:</label>
                            </div>
                            <div class="col-lg-8 mb-3 mb-sm-0 mt-1">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="tira" id="tira" required>
                                    <label class="custom-file-label" for="tira" data-browse="Buscar" >Selecciona un archivo</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="seguro_estudiante" class="col-form-label">Seguro de Estudiante:</label>
                            </div>
                            <div class="col-lg-8 mb-3 mb-sm-0 mt-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="seguro_estudiante" id="seguro_estudiante" required>
                                    <label class="custom-file-label" for="seguro_estudiante" data-browse="Buscar">Selecciona un archivo</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="seguro_axa" class="col-form-label">Seguro AXA:</label>
                            </div>
                            <div class="col-lg-8 mb-3 mb-sm-0 mt-1">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="seguro_axa" id="seguro_axa" required>
                                    <label class="custom-file-label" for="seguro_axa" data-browse="Buscar">Selecciona un archivo</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="credencial_escolar" class="col-form-label">Credencial Escolar:</label>
                            </div>
                            <div class="col-lg-8 mb-3 mb-sm-0 mt-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="credencial_escolar" id="credencial_escolar" required>
                                    <label class="custom-file-label" for="credencial_escolar" data-browse="Buscar">Selecciona un archivo</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="subirDocs">Envíar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Finaliza Modal Subir Documentación -->
    <!-- Inicia Modal Estatus de Documentación -->
    <div class="modal fade" id="modalConsulta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Estatus de la Documentación</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p>Si alguno de tus documentos aún no es aprobado, deberás volver a envíarlo para su verificación, revisa las notas para conocer los motivos de su rechazo.</p>
                        </div>
                    </div>
                    <div class="row" id="contenedorestdoc">
                        <div class="col-md-12 overflow-auto table-responsive-lg mt-3 mb-3">
                            <table class="table table-hover table-striped table-sm mt-3">
                                <thead>
                                    <th scope="col">#</th>
                                    <th scope="col">Documento</th>
                                    <th scope="col">Estatus</th>
                                    <th scope="col">Notas</th>
                                </thead>
                                <tbody id="tablaestadodocumentos">
                                    <!--ajax-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Finaliza Modal Estatus de Documentación -->
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
    <script src="js/alumno_inicio.js"></script>
</body>

</html>