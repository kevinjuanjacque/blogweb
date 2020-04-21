<?php
include ("conexion.php");
session_start();
if (!isset($_SESSION['id_usuario'])) {
	header("location: login");
}
$idusr=$_SESSION['id_usuario'];
$pregunta="SELECT nombre FROM usuarios WHERE idusr='$idusr'";
$resultadoNombre=$conexion->query($pregunta);
$row=$resultadoNombre->fetch_assoc();
$_SESSION['press']=FALSE;
$consulta="SELECT id,titulo,descripcion,usuario_id,url from preguntas" ;
$devuelvepreguntas=$conexion->query($consulta);

  include 'template/comun.php';


?>

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
        <div class="container-fluid">

          <!-- Page Heading -->
        
          <h1 class="h3 mb-4 text-gray-800">Publicaciones</h1>

          <?php foreach($devuelvepreguntas as $mostrar){ ?>

          <?php 
            $preguntador=$mostrar['usuario_id'];
            $pregunta="SELECT nombre FROM usuarios WHERE idusr='$preguntador'";
            $nombre=$conexion->query($pregunta);
            $name=$nombre->fetch_assoc();

          ?>



          <div class="card shadow mb-4">

            
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">
                    <?php 
                    echo $mostrar['titulo'];
                    echo ", publicacion de ";
                    echo $name['nombre'];
                    ?>
                    

                  </h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">

                  <?php echo $mostrar['descripcion'] ?>
                  <p></p>
                  <?php 
                    if (($mostrar['url'])) {
                      $foto=$mostrar['url'];
                      echo "<img src='$foto'  width='200' height='200'>";
         
                    }
                  ?>

                  <br>
                  <p></p>
                   <form name="respuestas" class="form-signin" action="responder.php" method="POST" >
                      <input type="hidden" name="id_pregunta" value="<?php 
                      echo $mostrar['id'] ?>">
                     
                      <button class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                          <i class="fas fa-flag"></i>
                        </span>
                        <span class="text">Comentar</span>
                      </button>
                 
                  </form>
                  <br>
                  <form name="respuestas" class="form-signin" action="ver.php" method="POST" >
                      <input type="hidden" name="id_pregunta" value="<?php 
                      echo $mostrar['id'] ?>">
                     
                      <button href="#" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                          <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Ver Comentario</span>
                    </button>
                 
                  </form>


                   </div>


                </div>

              </div>
              

        
        <!-- /.container-fluid -->
        <?php } ?>
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
