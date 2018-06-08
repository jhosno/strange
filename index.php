<?php

session_start();

error_reporting(E_ALL ^ E_NOTICE);




 include('Views/header.php'); ?>
<body>

<!--Alert success
<div class="alert alert-success" role="alert">
  This is a success alert—check it out!
</div>
-->
<!-- Modal Login -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Inicio de sesión</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" method="POST" action="Controllers/login.php" id="form-login">

          <div class="form-group">
            <label for="user">Email o usuario</label>
            <input type="text" class="form-control" id="user" placeholder="name@example.com" name="user">
          </div>
          <div class="form-group">
            <label for="password">Clave</label>
            <input type="password" class="form-control" id="password" placeholder="********" name="password">
          </div>
          <a href="#">Recuperar contraseña</a>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-warning">Entrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal Signup -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" method="POST" action="Controllers/signup.php">

          <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" placeholder="name@example.com" name="name">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
          </div>
          <div class="form-group">
            <label for="user">usuario</label>
            <input type="text" class="form-control" id="user" placeholder="name@example.com" name="user">
          </div>
          <div class="form-group">
            <label for="password">Clave</label>
            <input type="password" class="form-control" id="password" placeholder="********" name="password">
          </div>
          <div class="form-group">
            <label for="password-2">Confirme clave</label>
            <input type="password" class="form-control" id="password-2" placeholder="********">
          </div>
          <a href="#">Recuperar contraseña</a>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-warning	">Entrar</button>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark"  >
  <a class="navbar-brand" href="#">JH</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarToggler">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
      </li>
    </ul>

      <?php

      if(isset($_SESSION['usuario']) and $_SESSION['estado'] == 'Autenticado') {

        ?>


<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="Views/record_list.php">Bitácora</a>
        </li>
        <li class="nav-item">

          <a class="nav-link" href="Views/list.php">Usuarios</a>
        </li>
      </ul>
        <div class="dropleft nav-right">
          <a class="nav-link dropdown-toggle text-warning " href="#" id="navbarDropdownMenuUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION['usuario']; ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUser">
            <a class="dropdown-item" href="Views/prolife.php">Perfil</a>
            <a class="dropdown-item" href="Controllers/logout.php"><button class="btn btn-warning btn-block">Salir</button></a>
          </div>  
        </div>
      </li>
    </ul>
  </a>

</div>
</nav>





<?php
}
else
{  
  ?>
  <a data-toggle="modal"  
  data-titulo="Registro de usuario"
  data-target="#signupModal" >
  <button id="signup-trigger" class="btn btn-outline-warning  btn-sm">Registrarse
  </button>
</a>

<a data-toggle="modal" 
data-titulo="Inicio de Sesión " 
data-target="#loginModal" >
<button id="login-trigger" class="btn btn-warning btn-sm">
  ¡Entrar!
</button>
</a>

</nav>


<?php  } ?>




	<div class="container">
	<h2>¡Bienvenidos!</h2>
	<p>Este es un modesto módulo de usuario con bitácora. </p>	
    
  </div>

	



<footer>
	<!-- footer -->

	<?php include('Views/footer.php') ?>
	 
</footer>
</body>
</html>