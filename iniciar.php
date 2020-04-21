<?php  

	include ("conexion.php");
	$correo=$_POST['INCorreo'];
	$pass=$_POST['INPass'];

	$query="SELECT idusr,email,pass from usuarios where email='$correo' and pass=sha1('$pass')";
	$resultado=$conexion->query($query);

	$rows=$resultado->num_rows;
	session_start();
	if ($rows>0) {
		$row=$resultado->fetch_assoc();
		$_SESSION['id_usuario']=$row['idusr'];
		if($row['idusr']==1){
			header("Location: principal");
		
		}
		else{
			header("location: principal");
		}
	}
	else{
		echo "<script> alert('Email o contraseña incorrecta');
		window.location='login';
		</script>";
	}
?>