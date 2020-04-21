<?php  

	include ("conexion.php");

	$idpregunta=$_POST['idpregunta'];
    $idusuario=$_POST['idusuario'];
    $respuesta=$_POST['respuesta'];
    
    $query="INSERT INTO `respuestas`(`id_pregunta`, `id_usuario`, `respuesta`)  VALUES('$idpregunta','$idusuario','$respuesta')";
    if($result=$conexion->query($query))
        {
           echo "<script> alert('comentario agregada con exito');
            window.location='principal';
            </script>";
        }
        else{
            echo "<script> alert('Hubo un error vuelve a intentarlo mas tarde');
            window.location='principal';
            </script>";
        }
	
?>