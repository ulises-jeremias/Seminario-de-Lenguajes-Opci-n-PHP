<section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE ?></a></section>

<nav class="navbar navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- El logotipo y el icono que despliega el menú se agrupan
           para mostrarlos mejor en los dispositivos móviles -->
        <a class="navbar-brand waves-effect waves-light" href="?view=index"><p style="font-size: 20px;"> <?php echo (APP_TITLE); ?> </p></a>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target=".navbar-ex1-collapse">
                <span class="sr-only">Desplegar navegación</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Agrupar los enlaces de navegación, los formularios y cualquier
        otro elemento que se pueda ocultar al minimizar la barra -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a data-toggle="modal" data-target="#Search"><i class="glyphicon glyphicon-search"></i>  Search</a></li>
                <li class="dropdown">
                    <a class="" role="button" data-toggle="dropdown" href="#">
                        <i style="font-size: 20px;" class="glyphicon glyphicon-menu-hamburger"></i>
                    </a>
                    <ul class="dropdown-menu">
                      <?php
                        if(isLoggedIn()){
                          echo ('
                          <li><a href="#"><i class="glyphicon glyphicon-user"></i> ' . ($_users[$_SESSION['app_id']]['name']) . '</a></li>
                          <li><a href="?view=logout"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
                          <li><a href="#"><i class="glyphicon glyphicon-wrench"></i> Preferences</a></li>
                          <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Setting</a></li>
                          ');
                        } else {
                          echo ('
                          <li><a data-toggle="modal" data-target="#Login"><i class="glyphicon glyphicon-log-in"></i>  Log In</a></li>
                          <li><a data-toggle="modal" data-target="#Signup"><i class="glyphicon glyphicon-log-in"></i>  Sign Up</a></li>
                          ');
                        }
                      ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php
if(!isLoggedIn()) {
  include(HTML_DIR . '/public/login.php');
  include(HTML_DIR . '/public/signup.php');
}
include(HTML_DIR . '/public/search.php');
?>
