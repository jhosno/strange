<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark" id="nabar"  >
  <a class="navbar-brand" href="#">JH</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarToggler">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Home<span class="sr-only">(current)</span></a>
      </li>
    </ul>

  
<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="record_list.php">Bitácora</a>
        </li>
        <li class="nav-item">

          <a class="nav-link" href="list.php">Usuarios</a>
        </li>
      </ul>

        <div class="dropleft nav-right">
          <a class="nav-link dropdown-toggle text-warning " href="#" id="navbarDropdownMenuUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION['usuario']; ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUser">
            <a class="dropdown-item" href="prolife.php">Perfil</a>
            <a class="dropdown-item" href="../Controllers/logout.php"><button class="btn btn-warning btn-block">Salir</button></a>
          </div>  
        </div>
      </li>
    </ul>
  </a>

</div>
</nav>






