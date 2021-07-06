<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>YOOGA - Free Yoga Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet"> 
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <!--bootstrap y alertify-->
            <link rel="stylesheet" type= "text/css" href="libreria/bootstrap/css/bootstrap.css">
            <link rel="stylesheet" type= "text/css" href="libreria/alertifyjs/css/alertify.css">
            <link rel="stylesheet" type= "text/css" href="libreria/alertifyjs/css/themes/default.css">
        
            <script src="libreria/jquery-3.6.0.min.js"></script>
            <script src="js/funciones.js"></script>
            <script src="libreria/bootstrap/js/bootstrap.js"></script>
            <script src="libreria/alertifyjs/alertify.js"></script>
    </head>

    <body>
        <!-- Top Bar Start -->
        <div class="top-bar d-none d-md-block">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="top-bar-left">
                            <div class="text">
                                <i class="far fa-clock"></i>
                                <h2>8:00 - 9:00</h2>
                                <p>Mon - Fri</p>
                            </div>
                            <div class="text">
                                <i class="fa fa-phone-alt"></i>
                                <h2>+123 456 7890</h2>
                                <p>For Appointment</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="top-bar-right">
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->

        <!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                <a href="index.html" class="navbar-brand">Y<span>oo</span>ga</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a href="index.html" class="nav-item nav-link">Home</a>
                        <a href="about.html" class="nav-item nav-link active">About</a>
                        <a href="service.html" class="nav-item nav-link">Service</a>
                        <a href="price.html" class="nav-item nav-link">Price</a>
                        <a href="class.html" class="nav-item nav-link">Class</a>
                        <a href="team.html" class="nav-item nav-link">Trainer</a>
                        <a href="portfolio.html" class="nav-item nav-link">Pose</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Blog</a>
                            <div class="dropdown-menu">
                                <a href="blog.html" class="dropdown-item">Blog Grid</a>
                                <a href="single.html" class="dropdown-item">Blog Detail</a>
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->

    
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Actividades deportivas</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Home</a>
                        <a href="">Actividades deportivas</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <div class="container">  
        <div id="tabla"> </div>
        </div>

        <!--Imprimir la tabla-->
        <?php
        require_once "conexion.php";
        $conexion=conexion();
        ?>

        <div class="row">
            <div class="col-sm-12">
            
                <table class="table table-hover table-condensed table-bordered">
                <caption >
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNuevo">Agregar deporte</button> <!--Boton azul-->
                </caption>
                <tr>
                    <td>#</td>
                    <td>Nombre</td>
                    <td>Descripcion </td>
                    <td>Categoria</td>
                    <td>Fecha de creacion</td>
                    <td>Estatus</td>
                    <td>Editar</td>
                    <td>Eliminar</td>
                </tr>

            <?php
            $sql="SELECT id_actividad,nombre_actividad,descripcion,tipo_actividad,fecha_creacion,estatus_actividad from actividad_recreativa";
            $result=mysqli_query($conexion,$sql);
            while($ver=mysqli_fetch_row($result)){
                $datos=$ver[0]."||".
                    $ver[1]."||".
                    $ver[2]."||".
                    $ver[3]."||".
                    $ver[4]."||".
                    $ver[5];
            
            
            ?>

                <tr>
                    <td><?php echo $ver[0]?></td>
                    <td><?php echo $ver[1]?></td>
                    <td><?php echo $ver[2]?></td>
                    <td><?php echo $ver[3]?></td> 
                    <td><?php echo $ver[4]?></td>
                    <td><?php echo $ver[5]?></td>
                    <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalCambio"
                        onclick="agregaform('<?php echo $datos ?>')">Editar</button> <!--Boton amarillo-->
                    </td>
                    <td>
                        <button class="btn btn-danger" onclick="preguntarSiNo('<?php echo $ver[0] ?>')">Eliminar</button> <!--Boton rojo-->
                    </td>
                </tr>
            <?php   
            }
            ?>    
                </table>
                </div>
                </div>    
        <!--Fin imprimir la tabla-->
            

        <!-- Nuevos datos -->
        <div class="modal fade" id="modalNuevo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm"> <!--sm modal small-->
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Nuevo Deporte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="">Ingrese los siguientes datos:</label><br>
                <label>Nombre</label>
                <input type="text" name="" id="nombre" class="form-control input-sm">
                <label>Descripcion</label>
                <input type="text" name="" id="descripcion" class="form-control input-sm">
                <label>Categoria</label>
                <input type="text" name="" id="categoria" class="form-control input-sm">
                <label>Estatus</label>
                <input type="text" name="" id="estatus" class="form-control input-sm">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="guardarnuevo">Agregar</button>
            </div>
            </div>
        </div>
        </div>


    <!-- Editar datos -->
    <div class="modal fade" id="modalCambio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm"> <!--sm modal small-->
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar deporte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <label for="">Ingrese los siguientes datos:</label><br>
                <input type="text" hidden="" id="id" class="form-control input-sm">
                <label>Nombre</label>
                <input type="text" name="" id="nombre1" class="form-control input-sm">
                <label>Descripcion</label>
                <input type="text" name="" id="descripcion1" class="form-control input-sm">
                <label>Categoria</label>
                <input type="text" name="" id="categoria1" class="form-control input-sm">
                <label>Estatus</label>
                <input type="text" name="" id="estatus1" class="form-control input-sm">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal" id="actualizadatos">Actualizar</button>
            </div>
            </div>
        </div>
        </div>


        <!-- About Start 
        <div class="about wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-6">
                        <div class="about-img">
                            <img src="img/about.png" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="section-header text-left">
                            <p>Learn About Us</p>
                            <h2>Welcome to Yooga</h2>
                        </div>
                        <div class="about-text">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque maximus.
                            </p>
                            <a class="btn" href="">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        About End -->


        <!-- Footer Start -->
        <div class="footer wow fadeIn" data-wow-delay="0.3s">
            <div class="container-fluid">
                <div class="container">
                    <div class="footer-info">
                        <a href="index.html" class="footer-logo">Y<span>oo</span>ga</a>
                        <h3>123 Street, New York, USA</h3>
                        <div class="footer-menu">
                            <p>+012 345 67890</p>
                            <p>info@example.com</p>
                        </div>
                        <div class="footer-social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="container copyright">
                    <div class="row">
                        <div class="col-md-6">
                            <p>&copy; <a href="#">Your Site Name</a>, All Right Reserved.</p>
                        </div>
                        <div class="col-md-6">
                            <p>Designed By <a href="https://htmlcodex.com">HTML Codex</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

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

<script text="text/javascript">
$(document).ready(function(){
    $('#tabla').load('componentes/tabla.php')
});
</script>

</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#guardarnuevo').click(function(){
        nombre=$('#nombre').val();
        area=$('#area').val();
        sexo=$('#sexo').val();
       correo=$('#correo').val();
       agregardatos(nombre,area,sexo,correo);

    });
    
    $('#actualizadatos').click(function(){
        actualizadatos();
    });
});
</script>
