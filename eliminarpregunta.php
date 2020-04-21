<?php  

	include ("conexion.php");
	$idpregunta=$_POST['idpregunta'];
  
   
    $existe="SELECT id from preguntas where id=$idpregunta";
	$query="DELETE FROM preguntas WHERE id = $idpregunta";
    $resultado=$conexion->query($existe);
    $row=$resultado->fetch_assoc();
    $row=$resultado->num_rows;
	if ($row==0) {
		echo "<script> alert('La publicacion de la pregunta fallo!');
		window.location='preguntas';
		</script>";
	}
	else{
        $resultadoregistro=$conexion->query($query);
        if($resultadoregistro>0){
           echo "<script> alert('La publicacion ha sido eliminada!');
            window.location='preguntas';
            </script>";
        }
        else{
            echo "<script> alert('Hubo un error vuelve a intentarlo mas tarde');
            window.location='preguntas';
            </script>";
        }
	}
?>