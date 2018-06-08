<?php

session_start();

error_reporting(E_ALL ^ E_NOTICE);

include('header.php'); 
include('menu.php'); 
include('footer.php'); 
require('../Controllers/connection.php');
 
    $result = $connection->query("SELECT users.name, records.action, records.create_at, records.id, records.time FROM users JOIN records ON users.id = records.user_id");

?>
<body>
	

<div class="container">
<h2>Bitácora</h2>
<table class="table table-hover" id="records-table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Usuario</th>
      <th scope="col">Acción</th>
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
    </tr>
  </thead>
  <tbody>

<?php
	//die(var_dump($result[id]));
     while ($r = $result->fetch_assoc()) {
      	echo '<tr>';
           echo '<td>'.$r["id"].'</td>';
           echo '<td>'.$r["name"].'</td>';
           echo '<td>'.$r["action"].'</td>';
           echo '<td>'.$r["create_at"].'</td>';
           echo '<td>'.$r["time"].'</td>';
        echo '</tr>';
      } 
      $result->free();
     /* free result set */
     
?>
  </tbody>
</div>
<script>
  $(document).ready( function () {
    $('#records-table').DataTable();
} );
</script>
</body>