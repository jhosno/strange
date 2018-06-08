<?php

session_start();

error_reporting(E_ALL ^ E_NOTICE);

include('header.php'); 
include('menu.php'); 
include('footer.php'); 
require('../Controllers/connection.php');

$result = $connection->query("SELECT users.email, users.user,users.name, users.id, privileges.privilege FROM users JOIN privileges ON users.id = privileges.user_id");
   // die(var_dump($result));
?>
<body>
  

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="memberModalLabel">Editar</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>

        </div>
        <div class="modal-body">
        <div class="dash"></div>
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
            <div class="row">
            <div class="form-group col-md-6">
              <label for="password">Clave</label>
              <input type="password" class="form-control" id="password" placeholder="********">
            </div>
            <div class="form-group col-md-6">
              <label for="password-2">Confirme clave</label>
              <input type="password-2" class="form-control" id="password-2" placeholder="********">
            </div>
            </div>
            <div>
              <label for="privilege">Privilegio</label>
              <select name="privilege" id="privilege" class="form-control">
                <option value="">Seleccione</option>
                <option value="ADMIN">Administrador</option>
                <option value="USER">Usuario</option>
              </select>
            </div>
            <hr>
            <div class="form-group ">
              <label for="password-2">para Realizar los cambios debe colocar la contraseña de administrador </label>
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



  <div class="container">
    <h2>Bitácora</h2>
    <table class="table table-hover" id="users-table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Usuario</th>
          <th scope="col">Email</th>
          <th scope="col">Privilegio</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>

        <?php
	//die(var_dump($result[id]));
        while ($r = $result->fetch_assoc()) {
         echo '<tr>';
         echo '<td>'.$r["id"].'</td>';
         echo '<td>'.$r["name"].'</td>';
         echo '<td>'.$r["user"].'</td>';
         echo '<td>'.$r["email"].'</td>';
         echo '<td>'.$r["privilege"].'</td>';
         echo '<td>
         <a class="btn btn-small btn-warning"
         data-toggle="modal"
         data-target="#exampleModal"
         data-whatever="'.$r['id'].' "><i class="fas fa-user-edit"></i></a>
         <a class="btn btn-small btn-warning"
         data-toggle="modal"
         data-target="#exampleModal"
         data-whatever="'.$r['id'].' "><i class="fas fa-user-times"></i></a>
         <a class="btn btn-small btn-warning"
         data-toggle="modal"
         data-target="#exampleModal"
         data-whatever="'.$r['id'].' "><i class="fas fa-user-cog"></i> </a>
         </td>';
         echo '</tr>';
       } 
       $result->free();
       /* free result set */

       ?>
     </tbody>
   </div>
<script>
  
  $(document).ready( function () {
    $('#users-table').DataTable();
} );

</script>


 </body>