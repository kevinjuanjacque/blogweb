<?php
include ("conexion.php");
$idp=$_POST['id_pregunta'];
session_start();
if (!isset($_SESSION['id_usuario'])) {
	header("location: login");
}
$idusr=$_SESSION['id_usuario'];
$pregunta="SELECT nombre,idusr FROM usuarios WHERE idusr='$idusr'";
$resultadoNombre=$conexion->query($pregunta);


$row=$resultadoNombre->fetch_assoc();
$pregunta="SELECT id,titulo,descripcion FROM preguntas WHERE id='$idp'";
$resultadoNombre=$conexion->query($pregunta);
$row2=$resultadoNombre->fetch_assoc();


$pregunta="SELECT id,respuesta,id_usuario FROM respuestas WHERE id_pregunta='$idp'";
$devuleverespuestas=$conexion->query($pregunta);
$row3=$resultadoNombre->fetch_assoc();




  include 'template/comun.php';




?>

<div class="card shadow mb-4">

      
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary"><?php 
                echo $row2['titulo'] ?></h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">

                  <?php echo $row2['descripcion'] ?>
                  
                   


                   </div>


                </div>

</div>

<?php foreach($devuleverespuestas as $mostrar){ ?>
	<?php
		$respondedor=$mostrar['id_usuario'];
		$pregunta="SELECT nombre FROM usuarios WHERE idusr='$respondedor'";
		$resultadoNombre=$conexion->query($pregunta);
		$row4=$resultadoNombre->fetch_assoc();	
	?>
	<div class="col-xl-3 col-md-6 mb-4">
              
	<div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?php echo $row4['nombre'] ?> dice:  </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      	
                      	<?php 
                      		 echo $mostrar['respuesta']
                      	?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
          </div>
              <br>
<?php } ?>

 <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Creado en 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cerrar sesion</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Seguro deseas cerrar sesion?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="login">Aceptar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

