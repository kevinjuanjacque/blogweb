<?php
include ("conexion.php");
session_start();
if (!isset($_SESSION['id_usuario'])) {
	header("location: login");
}
$idusr=$_SESSION['id_usuario'];
$pregunta="SELECT nombre,idusr FROM usuarios WHERE idusr='$idusr'";
$resultadoNombre=$conexion->query($pregunta);
$row=$resultadoNombre->fetch_assoc();
$_SESSION['press']=FALSE;
include 'template/comun.php';
?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">crea tu pregunta</h1>
          <div class="card shadow mb-4">

          <!--*************************-->
          <!--*************************-->
          <!--*************************-->
          <!--*************************-->
          <!--PAGINA REAL-->
          <!--*************************-->
          <!--*************************-->
          <!--*************************-->
          <!--*************************-->
                <!-- Card Header - Accordion -->

        
    <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Pregunta</h5>
            <form name="formulario" class="form-signin" action="nuevapregunta.php" method="POST" >
              <div class="form-label-group">
                <input type="text" name="usuario"  class="form-control" placeholder="
                <?php
                    echo $row['nombre']
                ?>" 
                readonly="readonly">
                <input type="hidden" name="idcliente" value=
                "<?php
                    echo $row['idusr']
                ?>"
                >
                <label for="inputEmail">usuario </label>
                <small class="text-muted">(A este nombre se asociara la pregunta)</small>
              </div>

              <div class="form-label-group">
                <input class="form-control"  name="titulo" placeholder="titulo de tu pregunta">
                <label for="inputPassword">titulo</label>
              </div>
              <div class="form-label-group">
              <textarea name="desc" style="width:250px;height:150px;"></textarea>
                <label for="desc">descripcion de tu pregunta no mayor a 200 caracteres</label>
               
              </div>

              
              <button class="btn btn-lg btn-primary btn-block " type="submit" name="validacion" >
                <?php
                  echo  utf8_decode('Confirmar');
                  
                ?>
              </button>
              <hr class="my-4">
              
            </form>



          </div>
        </div>
      </div>
    </div>
  </div>

    
      <!--*************************-->
          <!--*************************-->
          <!--*************************-->
          <!--*************************-->
          <!--FIN PAGINA REAL-->
          <!--*************************-->
          <!--*************************-->
          <!--*************************-->
          <!--*************************-->

      <!-- Footer -->
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