<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Menú</title>
        <!--Bootstrap CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <!-- CSS Libraries -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet"> 
        <style>
            :root{
                --primary: #0D3665 !important;
                --secondary: #D5A52C !important;
                --indigo: #114B72 !important;
                --lightgray: #D5DADA !important;
            }
            body {
                background: #ffffff;
                font-family: 'Open Sans', sans-serif;
            }
            .intro .buttons a.btn {
                margin: 10px;
                padding: 10px 30px;
            }
            .btn{
                position: relative;
                display: inline-block;
                outline: none;
                color: var(--primary);
                text-decoration: none;
                text-transform: uppercase;
                letter-spacing: 1px;
                font-weight: 400;
                text-shadow: 0 0 1px rgba(213, 165, 44, 0.3);
                font-size: 14px;
                font-weight: 700;
                background-color: var(--lightgray) !important;
                border-color: var(--lightgray) !important;
                margin-bottom: 5px;
                margin-top: 5px;
            }
            .animated h2 {
                text-align: center;
                color: #fff;
            }
            .animated p {
                text-align: center;
                color: #fff;
            }
            .buttons {
                text-align: center;
                max-width: 200px;
            }
        </style>
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
                        <a href="index.html" class="nav-item nav-link mr-5"><img src="./icons/home.svg" alt="" width="15px"><span class="ml-2">Inicio</span></a>
                        <a href="about.html" class="nav-item nav-link mr-5"><img src="./icons/menu.svg" alt="" width="18px"><span class="ml-2">Menú</span></a>
                        <a href="service.html" class="nav-item nav-link mr-5"><img src="./icons/user.svg" alt="" width="18px"><span class="ml-2">Perfil</span></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->
        <!-- Inicio de Botones -->
        <div class="container align-item-center mt-5 mb-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                        <h1 class="mt-5">Menú</h1>
                    </div>                        
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="buttons"> 
                        <a href="#" class="btn btn-primary btn-lg wow fadeInRight animated" data-wow-duration="3s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 3s; animation-delay: 0.3s; animation-name: 1;">
                            <img src="./icons/sports.svg" alt="" width="80px">
                            <br><label>Actividades Deportivas</label>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="buttons"> 
                        <a href="#" class="btn btn-primary btn-lg wow fadeInRight animated" data-wow-duration="3s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 3s; animation-delay: 0.3s; animation-name: 2;">
                            <img src="./icons/concert.svg" alt="" width="80px">
                            <br><label>Información de Eventos</label>
                        </a> 
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="buttons"> 
                        <a href="#" class="btn btn-primary btn-lg wow fadeInRight animated" data-wow-duration="3s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 3s; animation-delay: 0.3s; animation-name: 3;">
                            <img src="./icons/inventory.svg" alt="" width="80px">
                            <br><label>Inventario de utileria</label>
                        </a> 
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="buttons"> 
                        <a href="./admin-horarios.php" class="btn btn-primary btn-lg wow fadeInRight animated" data-wow-duration="3s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 3s; animation-delay: 0.3s; animation-name: 4;">
                            <img src="./icons/calendar.svg" alt="" width="80px">
                            <br><label>Horarios de Deportes</label>
                        </a> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="buttons"> 
                        <a href="#" class="btn btn-primary btn-lg wow fadeInRight animated" data-wow-duration="3s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 3s; animation-delay: 0.3s; animation-name: 5;">
                            <img src="./icons/materials.svg" alt="" width="80px">
                            <br><label>Préstamos de Materiales</label>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="buttons"> 
                        <a href="#" class="btn btn-primary btn-lg wow fadeInRight animated" data-wow-duration="3s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 3s; animation-delay: 0.3s; animation-name: 6;">
                            <img src="./icons/field.svg" alt="" width="80px">
                            <br><label>Préstamos de Áreas Deportivas</label>
                        </a> 
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="buttons"> 
                        <a href="#" class="btn btn-primary btn-lg wow fadeInRight animated" data-wow-duration="3s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 3s; animation-delay: 0.3s; animation-name: 7;">
                            <img src="./icons/monitor.svg" alt="" width="80px">
                            <br><label>Inscripciones a Deportes</label>
                        </a> 
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="buttons">
                        <a href="#" class="btn btn-primary btn-lg wow fadeInRight animated" data-wow-duration="3s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 3s; animation-delay: 0.3s; animation-name: 8;">
                            <img src="./icons/doc.svg" alt="" width="80px">
                            <br><label>Documentación de Alumnos</label>
                        </a> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="buttons"> 
                        <a href="#" class="btn btn-primary btn-lg wow fadeInRight animated" data-wow-duration="3s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 3s; animation-delay: 0.3s; animation-name: 9;">
                            <img src="./icons/health-check.svg" alt="" width="80px">
                            <br><label>Devolución de Materiales</label>
                        </a> 
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="buttons"> 
                        <a href="#" class="btn btn-primary btn-lg wow fadeInRight animated" data-wow-duration="3s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 3s; animation-delay: 0.3s; animation-name: 10;">
                            <img src="./icons/table.svg" alt="" width="80px">
                            <br><label>Historial de Préstamos</label>
                        </a> 
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin de Botones -->
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