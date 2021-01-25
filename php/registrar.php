<?php 

include("con_db.php");

if (isset($_POST['register'])) {
    if (strlen($_POST['namec']) >= 1 && strlen($_POST['email']) >= 1) {
		$namec      = trim($_POST['namec']);
        $linkc      = trim($_POST['linkc']);
        $linkrs     = trim($_POST['linkrs']);
        $tag        = trim($_POST['tag']);
        $price      = trim($_POST['price']);
        $amount     = trim($_POST['amount']);
        $namer      = trim($_POST['namer']);
        $surnamer   = trim($_POST['surnamer']);
        $email      = trim($_POST['email']);
        $phone      = trim($_POST['fphone']);
        $content    = trim($_POST['content']);
	    $consulta = "INSERT INTO Datos de registro(nombreCanal, urlCanal, urlRs, categoria, precio, cantidad, nombreReal, apellidoReal, email, telefono, descripcion) 
		VALUES ('$namec',   
                '$linkc',   
                '$linkrs',  
                '$tag',     
                '$price',   
                '$amount',  
                '$namer',   
                '$surnamer',
                '$email',   
                '$phone',   
                '$content',)";
	    $resultado = mysqli_query($conex,$consulta);
	    if ($resultado) {
	    	?> 
	    	<h3 class="ok">¡Te has inscripto correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
           <?php
    }
}

?>