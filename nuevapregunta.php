<?php  
    
	include ("conexion.php");
    session_start();
	$id=$_POST['idcliente'];
    $titulo=$_POST['titulo'];
    $desc=$_POST['desc'];

    $tipospermitidos=array("image/jpg","image/jpeg","image/gif","image/png");
    

    if( is_null($_FILES['imagen'])){
        
        $query="INSERT INTO preguntas (usuario_id,titulo,descripcion) VALUES('$id','$titulo','$desc')";

    }else{
        if (in_array($_FILES['imagen']['type'], $tipospermitidos)) {
            
            
            $ruta="img/" . $_FILES['imagen']['name'];
            move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
            $query="INSERT INTO preguntas (usuario_id ,titulo ,descripcion , url ) VALUES('$id','$titulo','$desc','$ruta')";
        }
        else{
            
            $query="INSERT INTO preguntas (usuario_id,titulo,descripcion) VALUES('$id','$titulo','$desc')";

        }
        
    }



    
    
    if($resultadoregistro=$conexion->query($query))
        {
           echo "<script> alert('publicacion insertada con existo');
            window.location='principal';
            </script>";
        }
        else{
            echo "<script> alert('Hubo un error vuelve a intentarlo mas tarde');
            window.location='crearpregunta';
            </script>";
        }
	
?>