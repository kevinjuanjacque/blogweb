<?php  

	include ("conexion.php");
	$nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $email=$_POST['email'];
    $email=strtolower($email);
    $pass=$_POST['pass'];
    $comple=$nombre;
    $comple .=" ";
    $comple .=$apellido;
    $existe="SELECT email from usuarios where email='$email'";
	  $query="INSERT INTO usuarios (nombre,email,pass) VALUES('$comple','$email',sha1('$pass'))";
    $resultado=$conexion->query($existe);
    $row=$resultado->fetch_assoc();
    $row=$resultado->num_rows;
	if ($row>0) {
		echo "<script> alert('El usuario ya existe con ese correo');
		window.location='registrar';
		</script>";
	}
	else{
        $resultadoregistro=$conexion->query($query);
        if($resultadoregistro>0){
           echo "<script> alert('Registrado con existo');
            window.location='login';
            </script>";
        }
        else{
            echo "<script> alert('Hubo un error vuelve a intentarlo mas tarde');
            window.location='registrar';
            </script>";
        }
	}
?>