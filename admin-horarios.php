<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Horarios de Deportes</title>
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
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                        <h1 class="mt-5 mb-3"><strong>Horarios de Deportes</strong></h1>
                    </div>
                </div>
            </div>
            <div class="row" id="contenedor_actividades">
                <div class="col-lg-12 overflow-auto table-responsive-lg mt-3 mb-3" >
                    <table class="table table-hover table-striped table-sm">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Grupo</th>
                            <th scope="col">Deporte</th>
                            <th scope="col">Profesor</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Semestre</th>
                            <th scope="col">Cupo</th>
                            <th scope="col">Lugar</th>
                            <th scope="col">Estatus</th>
                            <th scope="col">Lunes</th>
                            <th scope="col">Martes</th>
                            <th scope="col">Miércoles</th>
                            <th scope="col">Jueves</th>
                            <th scope="col">Viernes</th>
                            <th scope="col">Opciones</th>
                        </thead>
                        <tbody id="contenido_tabla">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" id="lista_desplegable">
                <div class="col-lg-12">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalAgregar">Agregar Nuevo Horario</button>
                </div>
            </div>
        </div>
        <!-- Inicio Modal Agregar -->
        <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel"><strong>Agregar Nuevo Grupo</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="add-grupo" autocomplete="off">
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-weight-bold">Ingrese los siguientes datos:</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="grupo" class="col-form-label ml-1">Grupo:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <input type="text" name="grupo" id="grupo" class="form-control ml-1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="deporte" class="col-form-label ml-1">Deporte:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <select name="deportes" id="deportes" class="form-control ml-1">
                                        <!--ajax-->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="profesor" class="col-form-label ml-1">Profesor:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <input type="text" name="profe" id="profe" class="form-control ml-1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="telefono" class="col-form-label ml-1">Teléfono:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <input type="text" name="tel" id="tel" class="form-control ml-1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="Semestre" class="col-form-label ml-1">Semestre:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <select name="sem" id="sem" class="form-control ml-1">
                                        <!--ajax-->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="cupo" class="col-form-label ml-1">Cupo:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <input type="number" name="cupo" id="cupo" class="form-control ml-1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="lugar" class="col-form-label ml-1">Lugar:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <select name="lugar" id="lugar" class="form-control ml-1">
                                        <!-- ajax-->
                                    </select>
                                </div>
                            </div>
                            <label class="font-weight-bold">Horario:</label>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="lunes" class="col-form-label ml-1">Lunes:</label>
                                </div>
                                <div class="col-sm-1 mb-3 mb-sm-0">
                                    <label for="a" class="col-form-label ml-2">de</label>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="time" id="hora-inicio_l" class="form-control">
                                </div>
                                <div class="col-sm-1 mb-3 mb-sm-0">
                                    <label for="de" class="col-form-label">a</label>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="time" id="hora-fin_l" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="martes" class="col-form-label ml-1">Martes:</label>
                                </div>
                                <div class="col-sm-1 mb-3 mb-sm-0">
                                    <label for="de" class="col-form-label ml-2">de</label>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="time" id="hora-inicio_m" class="form-control">
                                </div>
                                <div class="col-sm-1 mb-3 mb-sm-0">
                                    <label for="a" class="col-form-label">a</label>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="time" id="hora-fin_m" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="miercoles" class="col-form-label ml-1">Miércoles:</label>
                                </div>
                                <div class="col-sm-1 mb-3 mb-sm-0">
                                    <label for="de" class="col-form-label ml-2">de</label>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="time" id="hora-inicio_mi" class="form-control">
                                </div>
                                <div class="col-sm-1 mb-3 mb-sm-0">
                                    <label for="a" class="col-form-label">a</label>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="time" id="hora-fin_mi" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="jueves" class="col-form-label ml-1">Jueves:</label>
                                </div>
                                <div class="col-sm-1 mb-3 mb-sm-0">
                                    <label for="de" class="col-form-label ml-2">de</label>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="time" id="hora-inicio_j" class="form-control">
                                </div>
                                <div class="col-sm-1 mb-3 mb-sm-0">
                                    <label for="a" class="col-form-label">a</label>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="time" id="hora-fin_j" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="viernes" class="col-form-label ml-1">Viernes:</label>
                                </div>
                                <div class="col-sm-1 mb-3 mb-sm-0">
                                    <label for="de" class="col-form-label ml-2">de</label>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="time" id="hora-inicio_v" class="form-control">
                                </div>
                                <div class="col-sm-1 mb-3 mb-sm-0">
                                    <label for="a" class="col-form-label">a</label>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="time" id="hora-fin_v" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary agregar_horario" data-dismiss="modal" id="agregar-nuevo">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Modal Agregar -->
        <!-- Inicio Modal Editar Datos -->
        <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel"><strong>Editar Datos</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-weight-bold">Ingrese los siguientes datos:</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">

                                    <label for="grupo" class="col-form-label ml-1">Grupo:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <input type="text" name="grupo_edit" id="grupo_edit" class="form-control ml-1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="deporte" class="col-form-label ml-1">Deporte:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <select name="deportes-edit" id="deportes_edit" class="form-control ml-1">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="profesor-edit" class="col-form-label ml-1">Profesor:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <input type="hidden" name="grupo_id_edit" id="grupo_id_edit" class="form-control ml-1">
                                    <input type="hidden" name="horario_id_edit" id="horario_id_edit" class="form-control ml-1">
                                    <input type="text" name="profe-edit" id="profe-edit" class="form-control ml-1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="telefono" class="col-form-label ml-1">Teléfono:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <input type="text" name="tel-edit" id="tel-edit" class="form-control ml-1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="Semestre" class="col-form-label ml-1">Semestre:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <select name="sem_edit" id="sem_edit" class="form-control ml-1">


                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="cupo" class="col-form-label ml-1">Cupo:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <input type="number" name="cupo-edit" id="cupo-edit" class="form-control ml-1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="lugar" class="col-form-label ml-1">Lugar:</label>
                                </div>
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                    <select name="lugar-edit" id="lugar_edit" class="form-control ml-1">

                                    </select>
                                </div>
                            </div>
                            <label class="font-weight-bold">Horario:</label>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="lunes-edit" class="col-form-label ml-1">Lunes:</label>
                                </div>
                                <div class="col-sm-1 mb-3 mb-sm-0">
                                    <label for="a" class="col-form-label ml-2">de</label>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="time" id="hora-inicio-l-edit" class="form-control">
                                </div>
                                <div class="col-sm-1 mb-3 mb-sm-0">
                                    <label for="de" class="col-form-label">a</label>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="time" id="hora-fin-l-edit" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="martes" class="col-form-label ml-1">Martes:</label>
                                </div>
                                <div class="col-sm-1 mb-3 mb-sm-0">
                                    <label for="de" class="col-form-label ml-2">de</label>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="time" id="hora-inicio-m-edit" class="form-control">
                                </div>
                                <div class="col-sm-1 mb-3 mb-sm-0">
                                    <label for="a" class="col-form-label">a</label>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="time" id="hora-fin-m-edit" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="miercoles" class="col-form-label ml-1">Miércoles:</label>
                                </div>
                                <div class="col-sm-1 mb-3 mb-sm-0">
                                    <label for="de" class="col-form-label ml-2">de</label>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="time" id="hora-inicio-mi-edit" class="form-control">
                                </div>
                                <div class="col-sm-1 mb-3 mb-sm-0">
                                    <label for="a" class="col-form-label">a</label>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="time" id="hora-fin-mi-edit" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="jueves" class="col-form-label ml-1">Jueves:</label>
                                </div>
                                <div class="col-sm-1 mb-3 mb-sm-0">
                                    <label for="de" class="col-form-label ml-2">de</label>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="time" id="hora-inicio-j-edit" class="form-control">
                                </div>
                                <div class="col-sm-1 mb-3 mb-sm-0">
                                    <label for="a" class="col-form-label">a</label>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="time" id="hora-fin-j-edit" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="viernes" class="col-form-label ml-1">Viernes:</label>
                                </div>
                                <div class="col-sm-1 mb-3 mb-sm-0">
                                    <label for="de" class="col-form-label ml-2">de</label>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="time" id="hora-inicio-v-edit" class="form-control">
                                </div>
                                <div class="col-sm-1 mb-3 mb-sm-0">
                                    <label for="a" class="col-form-label">a</label>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="time" id="hora-fin-v-edit" class="form-control">
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary guardat_datos_Editar" data-dismiss="modal" id="editar-datos">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Modal Editar Datos-->
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
            let tabla=false;
        </script>
        <script src="js/main.js"></script>
        <script src="js/horarios.js"></script>
        <script src="js/actividades_deportivas.js"></script>
        <script src="js/espacios.js"></script>
    </body>
</html>