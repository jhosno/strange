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
        <h5 class="modal-title" id="exampleModalLabel">Inicio de sesión</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" method="POST" action="" id="form-login">

          <div class="form-group">
            <label for="user">Email o usuario</label>
            <input type="email" class="form-control" id="user" placeholder="name@example.com" name="user">
          </div>
          <div class="form-group">
            <label for="password">Clave</label>
            <input type="password" class="form-control" id="password" placeholder="********" name="password">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Entrar</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" method="POST" action="">

          <div class="form-group">
            <label for="name">Nombre</label>
            <input type="email" class="form-control" id="name" placeholder="name@example.com" name="name">
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
            <input type="password" class="form-control" id="password" placeholder="********">
          </div>
          <div class="form-group">
            <label for="password-2">Confirme clave</label>
            <input type="password-2" class="form-control" id="password-2" placeholder="********">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Entrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>









<nav class="navbar navbar-expand-lg navbar-dark bg-dark"  >
  <a class="navbar-brand" href="#">JH</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Bitácora</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Usuario</a>
      </li>
    </ul>

    <a data-toggle="modal"  
    data-target="#signupModal" >
    <button id="signup-trigger" class="btn btn-outline-warning  btn-sm">Registrarse
    </button>
  </a>

  <a data-toggle="modal" 
  data-titulo="Inicio de Sesión" 
  data-target="#loginModal" >
  <button id="login-trigger" class="btn btn-warning btn-sm">
    ¡Entrar!
  </button>
</a>

</div>
</nav>



<script type="text/javascript">
    $('#loginModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var modal = $(this);
            $.ajax({
                type: "GET",
                url: "Controllers/login.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.dash').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
    $('#signupModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var modal = $(this);
            $.ajax({
                type: "GET",
                url: "Controllers/signup.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.dash').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
      </script>