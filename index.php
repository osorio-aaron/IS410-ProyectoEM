<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Easy Market</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/all.css">
</head>
<body>
    <!--Todo el navbar-->
    <nav id="menu" class="navbar navbar-expand-lg navbar-light fixed-top hov">
        <!--Botón con el logo-->
        <a class="navbar-brand" href="#">
            <img src="img/logo.svg">
        </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <!--Elementos de la barra-->
            <ul class="navbar-nav mr-auto ml-auto">
                <li class="nav-item">
                    <a class="nav-link bld" href="#">Ofertas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bld" href="#">Proximas Ofertas</a>
                </li>
                <li class="nav-item dropdown">
                    <!--Botón desplegable de la barra-->
                    <a class="nav-link dropdown-toggle bld" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categorias
                    </a>
                    <!--Elementos desplegables-->
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item bld" href="#">Belleza</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item bld" href="#">Deportes</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item bld" href="#">Electrónica</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item bld" href="#">Hogar</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item bld" href="#">Informática</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item bld" href="#">Juguetes</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item bld" href="#">Libros</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item bld" href="#">Moda</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item bld" href="#">Videojuegos</a>
                    </div>
                    <!--Otros elementos de la barra-->
                </li>
                <li class="nav-item">
                    <a class="nav-link bld" href="#">Empresas</a>
                </li>
            </ul>
            <div class="d-flex" id="navbarSupportedContent">
                <!--Botón de Busqueda-->
                <form>
                    <div class="form-group nav-item input-search">
                        <input class="form-control input-transparent" style="margin-right: 5px;" type="text" placeholder="Search...">
                        <a class="fa fa-search icon navbar-brand" href="#"></a>
                    </div>
                </form>
                <!--Botón de Inicio de Sesión-->
                <div class="nav-item"><a class="fas fa-sign-in-alt icon navbar-brand" href="#" data-toggle="modal" data-target="#modalUser"></a></div>
                <!--Botón del carrito-->
                <div class="nav-item"><a class="fas fa-shopping-cart icon navbar-brand" href="#" data-toggle="modal" data-target="#modalShop"></a></div>
            </div>
        </div>
    </nav>
    <!-- Modal Login-->
    <div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form id="user-login">
                        <div class="form-group">
                            <label for="email">Correo Electronico</label>
                            <input type="email" id="user-email" name="email" class="form-control" placeholder="correo@dominio.com" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" id="user-password" name="password" class="form-control" placeholder="Ingrese su contraseña" required>
                        </div>
                        <a href="registrarse.html" target="_blank">¿No tienes una cuenta? <b>Registrate Ya</b></a><br><br>
                        <div style="text-align: right;">
                            <input onclick="loginUser()" type="button" id="btn-login" value="Iniciar Sesión" class="btn btn-primary">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal Carrito-->
    <div class="modal fade" id="modalShop" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Carrito de Compras</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body alert alert-warning" role="alert">
                    ¡¡¡Debe de iniciar Sesión para acceder al carrito de compras!!!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <!--Contenedor de artículos-->
    <main role="main" style="margin-top: 100px" class="container">
        <div class="row">
            <div class="col-xl-3 col-sm-6">
                <div class="producto" data-toggle="modal" data-target="#modalProducto">
                    <div class="card-img-top">
                        <img class="img-thumbnail" src="img/prueba1.jpg">
                    </div>
                    <div class="info-producto">
                        <h3>Samsung S10</h4>
                        <h5>20,000.00 &nbsp;lps</h5>
                        <h5>JETSTEREO</h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="producto">
                    <div class="card-img-top">
                        <img class="img-thumbnail" src="img/prueba2.jpg">
                    </div>
                    <div class="info-producto">
                        <h3>iPhone 5s</h3>
                        <h5>Precio</h5>
                        <h5>Empresa</h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="producto">
                    <div class="card-img-top">
                        <img class="img-thumbnail" src="img/prueba3.jpg">
                    </div>
                    <div class="info-producto">
                        <h3>imagen random</h3>
                        <h5>Precio</h5>
                        <h5>Empresa</h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="producto">
                    <div class="card-img-top">
                        <img class="img-thumbnail" src="img/prueba4.jpg">
                    </div>
                    <div class="info-producto">
                        <h3>Ventilador</h3>
                        <h5>Precio</h5>
                        <h5>Empresa</h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="producto">
                    <div class="card-img-top">
                        <img class="img-thumbnail" src="img/prueba5.jpg">
                    </div>
                    <div class="info-producto">
                        <h3>Reloj</h3>
                        <h5>Precio</h5>
                        <h5>Empresa</h5>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <!--Modal Producto-->
    <div id="modalProducto" tabindex="-1" role="dialog" class="modal fade quickview show" style="display: none; padding-right: 17px;" aria-modal="true">
        <div role="document" class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="row">
                        <div class="col-xl-6 col-md-12">
                            <img src="img/prueba1.jpg" class="img-fluid">
                        </div>
                        <div class="col-xl-6 col-md-12">
                            <h3 style="text-align: center;">Samsung S10</h3><br>
                            <div class="d-flex row">
                                <div class="col-lg-6 col-sm-12">
                                    <h6 class="text-product">LPS. 20,000.00</h6>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <h6 class="text-product">20 Opiniones</h6>
                                </div>
                            </div>
                            <h6 class="text-product">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga sapiente odit aperiam itaque voluptatum error excepturi quod doloremque sunt accusantium id consectetur mollitia, vero necessitatibus, ratione, laudantium sint! Nisi accusamus ad commodi quas earum inventore repudiandae corrupti veritatis dolorum nemo?</h6>
                            <form>    
                                <div class="form-group" style="text-align: center;">
                                    <label class="text-product" for="cantidadArticulos">Cantidad de Artículos</label>
                                    <input type="number" name="cantidadArticulos" id="cantidadArticulos" class="form-control detail-quantity mr-auto ml-auto" min="1" max="10" required>
                                </div>
                                <div style="text-align: center">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Añadir al carrito</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer-index">
        <div class="row" style="padding:20px;">
            <div class="col-xl-3 col-md-6 col-sm-12 foot-item">
                <h5>Dashboard Administrativo</h5>
                <ul style="margin-bottom: 0px;">
                    <li><a href="admin/admin-enterprise.html" target="_blank">Empresarial</a></li>
                    <li><a href="admin/admin-suser.html" target="_blank">Super Usuario</a></li>
                </ul>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 foot-item">
                <h5>Mision</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, maiores cum? Voluptate sed tempore quisquam maxime corrupti perspiciatis ipsum voluptatum!</p>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 foot-item">
                <h5>Vision</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, maiores cum? Voluptate sed tempore quisquam maxime corrupti perspiciatis ipsum voluptatum!</p>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 foot-item">
                <h5>Contactanos</h5>
                <ul style="margin-bottom: 0px;">
                    <li>correo.em@correo.com</li>
                    <li>+504-95440680</li>
                    <li>
                        <a href="http://facebook.com" target="_blank"><i class="fab fa-facebook">&nbsp;</i></a>
                        <a href="http://twitter.com" target="_blank"><i class="fab fa-twitter">&nbsp;</i></a>
                        <a href="http://instagram.com" target="_blank"><i class="fab fa-instagram">&nbsp;</i></a>
                        <a href="http://linkedin.com" target="_blank"><i class="fab fa-linkedin-in">&nbsp;</i></a>
                    </li>
                </ul>
            </div>
            <div class="mr-auto ml-auto" style="margin-top: 10px;">
                <p style="text-align: center;">&copy; Easy Market. Todos los derechos reservados</p>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/controlador.js"></script>
    <script type="text/javascript" src="js/controlador-login-user.js"></script>
</body>
</html>