<?php

session_start();

error_reporting(E_ALL ^ E_NOTICE);

include('header.php'); 
include('menu.php'); 
include('footer.php'); 
require('../Controllers/Connection.php');

$result = $connection->query("SELECT users.email, users.user,users.name, users.id, privileges.privilege FROM users JOIN privileges ON users.id = privileges.user_id");
    
?>
<body>

  <div class="container">
    <h2>Recuperación</h2>
    <form action="" class="form">

      <div class="form-group col-md-6">
        <label for="" class="">Email</label>
        <input type="text" class="form-control">
      
      <hr>
      <div class="text-center">
        <button type="submit" class="btn btn-warning">Guardar</button>
        
      </div>
    </form>

 </body>