<?php include 'incs/funs.php'; ?>

<h3>Generación archivo .3d</h3>
<hr size="4">

<?php

	$js = getjson();
	$nombre = crear_archivo();
	$cadena_archivo = montar_cadena($js);
	volcar($nombre,$cadena_archivo);

 ?>