<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Información de Eventos</title>
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
                    <h1 class="mt-5 mb-3"><strong>Información de Eventos</strong></h1>
                </div>
            </div>
        </div>
        <div class="row" id="contenedor_eventos">
            <div class="col-lg-12 overflow-auto table-responsive-lg mt-3 mb-3">
                <table class="table table-hover table-striped table-sm">
                    <thead>
                        <th scope="col">#</th>
                        <th scope="col">Evento</th>
                        <th scope="col">Encargado</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Lugar</th>
                        <th scope="col">Recurso</th>
                        <th scope="col">Cant. Recurso</th>
                        <th scope="col">Semestre</th>
                        <th scope="col">Fechas</th>
                        <th scope="col">Horarios</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Opciones</th>
                    </thead>
                    <tbody id="contenido_tbleventos">
                        <!-- AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row" id="lista_desplegable_material">
            <div class="col-lg-12">
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalAgregar">Agregar Evento</button>
            </div>
        </div>
    </div>
    <!--Fin Tabla-->

    <!-- Inicio Modal Agregar -->
    <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Agregar Nuevo Evento</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="./control/add_eventos.php" method="POST">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="font-weight-bold">Ingrese los siguientes datos:</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label for="evento" class="col-form-label ml-1">Evento:</label>
                            </div>
                            <div class="col-sm-10 mb-3 mb-sm-0">
                                <input type="text" name="evento" id="evento" class="form-control ml-2" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label for="encargado" class="col-form-label ml-1">Encargado:</label>
                            </div>
                            <div class="col-sm-10 mb-3 mb-sm-0">
                                <input type="text" name="encargado" id="encargado" class="form-control ml-2" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label for="telefono" class="col-form-label ml-1">Teléfono:</label>
                            </div>
                            <div class="col-sm-10 mb-3 mb-sm-0">
                                <input type="text" name="telefonoEv" id="telefonoEv" class="form-control ml-2" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label for="cupo" class="col-form-label ml-1">Semestre:</label>
                            </div>
                            <div class="col-sm-10 mb-3 mb-sm-0">
                                <select name="semEv" id="semEv" class="form-control ml-2" required>
                                    <!--ajax-->
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label for="lugar" class="col-form-label ml-1">Lugar:</label>
                            </div>
                            <div class="col-sm-10 mb-3 mb-sm-0">
                                <select name="lugarEv" id="lugarEv" class="form-control ml-2" required>
                                    <!--ajax-->
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label for="material" class="col-form-label ml-1">Material:</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <select name="materialEv" id="materialEv" class="form-control ml-2" required>
                                    <!-- Ajax -->
                                </select>
                            </div>
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <button class="btn-img"><img src="./icons/add.svg" alt="..." width="30px"></button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label for="cantidadEv" class="col-form-label ml-1">Cantidad:</label>
                            </div>
                            <div class="col-sm-10 mb-3 mb-sm-0">
                                <input type="number" name="cantidadEv" id="cantidadEv" class="form-control ml-2" required>
                            </div>
                        </div>
                        <!--<div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="material" class="col-form-label ml-1">Material:</label>
                                </div>
                                <div class="col-sm-8 mb-3 mb-sm-0">
                                    <select name="material" id="material" class="form-control ml-2">
                                        <option>Red tenis</option>
                                        <option>Pelotas de tenis</option>
                                        <option>Raquetas de tenis</option>
                                    </select>
                                </div>
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <button class="btn-img"><img src="./icons/add.svg" alt="..." width="30px"></button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="cantidad" class="col-form-label ml-1">Cantidad:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <input type="number" name="cantidad" id="" class="form-control ml-2">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="material" class="col-form-label ml-1">Material:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <select name="material" id="material" class="form-control ml-2">
                                        <option>Red tenis</option>
                                        <option>Pelotas de tenis</option>
                                        <option>Raquetas de tenis</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="cantidad" class="col-form-label ml-1">Cantidad:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <input type="number" name="cantidad" id="" class="form-control ml-2">
                                </div>
                            </div>-->
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="descripcion" class="col-form-label ml-1">Descripción:</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <textarea name="descripcionEv" id="descripcionEv" cols="30" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="fecha_inicio" class="col-form-label ml-1">Fecha de inicio:</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="fecha_cierre" class="col-form-label ml-1">Fecha de cierre:</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <input type="date" name="fecha_cierre" id="fecha_cierre" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="hora_inicio" class="col-form-label ml-1">Hora de inicio:</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="hora_cierre" class="col-form-label ml-1">Hora de cierre:</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <input type="time" name="hora_cierre" id="hora_cierre" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="poster" class="col-form-label ml-1">Poster:</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="poster" id="poster" accept="image/png,image/jpeg,image/jpg" required>
                                    <label class="custom-file-label" for="poster" data-browse="Buscar">Seleccione un archivo</label>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="btn">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary">Agregar</button>
                    </div>
                </div>
                    <!---->
                    </form>
            </div>
        </div>
    </div>
    <!-- Fin Modal Agregar -->

    <!--Inicia Modal Editar datos -->
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel"><strong>Actualizar Evento</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="./control/list_eventos2.php" method="POST">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="font-weight-bold mr-1">Ingrese los datos:</p>
                                <div id="contenedor_evento"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label for="evento" class="col-form-label ml-1">Evento:</label>
                            </div>
                            <div class="col-sm-10 mb-3 mb-sm-0">
                                <input type="hidden" name="filtro" id="filtro" class="form-control ml-2" value="2">
                                <!--filtro del control-->
                                <input type="hidden" name="evento_id_edit" id="evento_id_edit" class="form-control ml-2">
                                <!--recuperamos el id-->
                                <input type="text" name="eventoEd" id="eventoEd" class="form-control ml-2" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label for="encargado" class="col-form-label ml-1">Encargado:</label>
                            </div>
                            <div class="col-sm-10 mb-3 mb-sm-0">
                                <input type="text" name="encargadoEd" id="encargadoEd" class="form-control ml-2" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label for="telefono" class="col-form-label ml-1">Telefono:</label>
                            </div>
                            <div class="col-sm-10 mb-3 mb-sm-0">
                                <input type="text" name="telefonoEvEd" id="telefonoEvEd" class="form-control ml-2" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label for="cupo" class="col-form-label ml-1">Semestre:</label>
                            </div>
                            <div class="col-sm-10 mb-3 mb-sm-0">
                                <select name="semEvEd" id="semEvEd" class="form-control ml-2" required>
                                    <!--ajax-->
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label for="lugar" class="col-form-label ml-1">Lugar:</label>
                            </div>
                            <div class="col-sm-10 mb-3 mb-sm-0">
                                <select name="lugarEvEd" id="lugarEvEd" class="form-control ml-2" required>
                                    <!--ajax-->
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label for="material" class="col-form-label ml-1">Material:</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <select name="materialEvEd" id="materialEvEd" class="form-control ml-2" required>
                                    <!--ajax-->
                                </select>
                            </div>
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <button class="btn-img"><img src="./icons/add.svg" alt="..." width="30px"></button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 mb-3 mb-sm-0">
                                <label for="cantidad" class="col-form-label ml-1">Cantidad:</label>
                            </div>
                            <div class="col-sm-10 mb-3 mb-sm-0">
                                <input type="number" name="cantidadEvEd" id="cantidadEvEd" class="form-control ml-2" required>
                            </div>
                        </div>
                        <!--<div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="material" class="col-form-label ml-1">Material:</label>
                                </div>
                                <div class="col-sm-8 mb-3 mb-sm-0">
                                    <select name="material" id="material" class="form-control ml-2">
                                        <option>Red tenis</option>
                                        <option>Pelotas de tenis</option>
                                        <option>Raquetas de tenis</option>
                                    </select>
                                </div>
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <button class="btn-img"><img src="./icons/add.svg" alt="..." width="30px"></button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="cantidad" class="col-form-label ml-1">Cantidad:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <input type="number" name="cantidad" id="" class="form-control ml-2">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="material" class="col-form-label ml-1">Material:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <select name="material" id="material" class="form-control ml-2">
                                        <option>Red tenis</option>
                                        <option>Pelotas de tenis</option>
                                        <option>Raquetas de tenis</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="cantidad" class="col-form-label ml-1">Cantidad:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <input type="number" name="cantidad" id="" class="form-control ml-2">
                                </div>
                            </div>-->
                        <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label for="descripcion" class="col-form-label ml-1">Descripción:</label>
                            </div>
                            <div class="col-sm-9 mb-3 mb-sm-0">
                                <textarea name="descripcionEvEd" id="descripcionEvEd" cols="30" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="fecha_inicio" class="col-form-label ml-1">Fecha de inicio:</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <input type="date" name="fecha_inicioEd" id="fecha_inicioEd" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="fecha_cierre" class="col-form-label ml-1">Fecha de cierre:</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <input type="date" name="fecha_cierreEd" id="fecha_cierreEd" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="hora_inicio" class="col-form-label ml-1">Hora de inicio:</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <input type="time" name="hora_inicioEd" id="hora_inicioEd" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="hora_cierre" class="col-form-label ml-1">Hora de cierre:</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <input type="time" name="hora_cierreEd" id="hora_cierreEd" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="poster" class="col-form-label ml-1">Poster:</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <div class="custom-file">
                                    <input type="file" name="posterEd" id="posterEd" class="custom-file-input" accept="image/png,image/jpeg,image/jpg" required>
                                    <label class="custom-file-label" for="posterEd" data-browse="Buscar">Seleccione un archivo</label>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary">Guardar</button>
                    <!--<button type="button" class="btn btn-primary guardar_datos_editar" data-dismiss="modal"  id="editar-datos">Guardar</button>-->
                </div>
                </form>
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
    <!--<script>
            let tablaEv =false;
        </script>-->
    <script src="js/main.js"></script>
    <script src="js/eventos.js"></script>
    <script src="js/horarios.js"></script>
    <!--se ocupo para llamar a la función de semestres-->
    <script src="js/espacios.js"></script>
    <!--se ocupo para llamar a la función de semestres-->
</body>

</html>