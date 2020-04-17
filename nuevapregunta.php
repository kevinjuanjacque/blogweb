<?php  

	include ("conexion.php");
	$id=$_POST['idcliente'];
    $titulo=$_POST['titulo'];
    $desc=$_POST['desc'];
    
    $query="INSERT INTO preguntas (usuario_id,titulo,descripcion) VALUES('$id','$titulo','$desc')";
    
    if($resultadoregistro=$conexion->query($query))
        {
           echo "<script> alert('pregunta insertada con existo');
            window.location='principal';
            </script>";
        }
        else{
            echo "<script> alert('Hubo un error vuelve a intentarlo mas tarde');
            window.location='crearpregunta';
            </script>";
        }
	
?>