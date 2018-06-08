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
      <a data-toggle="modal" data-titulo="Inicio de Sesión" data-target="#all-modal" ><button id="login-trigger" class="btn btn-outline-success my-2 my-sm-0">
      LogIn
    </button></a>
    <a data-toggle="modal" data-titulo="Registro de usuario" data-load="" data-target="#all-modal" ><button id="signup-trigger" class="btn btn-outline-warning my-2 my-sm-0">
      SignUp
    </button></a>


  </div>
</nav>
  
  <script type="text/javascript">
    var iconPrefix = '.glyphicon-';


    $('#login-trigger').click(ajaxDemo);
        function ajaxLogin() {
        var title = 'Login';
        var params = {
            buttons: [
               { text: 'Salir', close: true, style: 'danger' },
               { text: '¡Entrar!', close: false, style: 'success', click: ajaxLogin }
            ],
            size: eModal.size.lg,
            title: title,
            url: 'http://maispc.com/app/proxy.php?url=http://loripsum.net/api/' + Math.floor((Math.random() * 7) + 1) + '/short/ul/bq/prude/code/decorete'
        };

        return eModal
            .ajax(params)
            .then(function () { alert('Ajax Request complete!!!!', title) });
    }
    $('#signup-trigger').on('click', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal

          $.ajax({
            url: '/Views/users/signup.php',
            method:'GET',
            data:{},
            success:function(data)
            {
              $('#all-modal').html(data);
          }
      });
      });

    $('#login-trigger').on('click', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal

          $.ajax({
            url: '<?php return('/Views/users/login.php')?>',
            method:'GET',
            data:{},
            success:function(data)
            {
              $('#all-modal').html(data);
          }
      });
      });
    
  </script>