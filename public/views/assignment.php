<?php
  session_start();
  require '../../config/conexion.php';
  if (isset($_SESSION['loginUser'])) {
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include('head.php'); ?>
  </head>
  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

      <?php include("sidebar.php"); ?>

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <?php include("topbar.php"); ?>

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Page Heading -->

            <div class="row">
              <div class="col-sm-12">
                <div class="card">


                  <!-- HEADER CARD ------------------------ -->

                  <div class="card-header d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-desktop mr-2"></i>Asignacion de Equipos</h6>
                    <div class="no-arrow">
                      <ul class="nav nav-pills nav-pills-primary justify-content-end" id="pills-tab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="pills-list-tab" data-toggle="pill" href="#pills-list" role="tab" aria-controls="pills-list" aria-selected="true"><i class="fas fa-list mr-2 fa-sm"></i>Listado</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="pills-formAsig-tab" data-toggle="pill" href="#pills-formAsig" role="tab" aria-controls="pills-formAsig" aria-selected="false"><i class="far fa-file mr-2 fa-sm"></i>Registro</a>
                        </li>
                      </ul>
                    </div>
                  </div>

                  <!-- BODY CARD ------------------------------------ -->
                  <div class="card-body">

                    <div class="tab-content" id="pills-tabContent">

                      <!-- primer PANEL -->

                      <div class="tab-pane fade show active" id="pills-list" role="tabpanel" aria-labelledby="pills-list-tab">
                        <div id="tableAsig"></div>
                      </div>

                      <!-- segundo PANEL -->

                      <div class="tab-pane fade" id="pills-formAsig" role="tabpanel" aria-labelledby="pills-formAsig-tab">

                        <!-- 1ra fila FORMULARIO  -->
                        <div class="row">
                          <div class="col-sm-12">
                            <form id="formNewAsignament">
                              <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group row">
                                    <label for="newAsigSerie" class="col-form-label col-form-label-sm col-sm-3">Serie :</label>
                                    <div class="col-sm-5">
                                      <select class="form-control form-control-sm" id="newAsigSerie" name="newAsigSerie" style="width:100%">
                                        <option value="">Elije producto</option>
            														<?php $prod = $con->query("SELECT * FROM equipo WHERE cantidad_equipo <> 0 ");
            																while ($row = $prod->fetch_assoc()) {
            																	echo "<option value='".$row['id_equipo']."' ";
            																	echo ">";
            																	echo $row['serie_equipo'];
            																	echo "</option>";
            																}
            														?>
                                      </select>
                                    </div>
                                    <label for="newAsigCant" class="col-form-label col-form-label-sm col-sm-2">Cant:</label>
                                    <div class="col-sm-2">
                                      <input type="number" class="form-control form-control-sm" id="newAsigCant" name="newAsigCant">
                                    </div>
                                  </div>
                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                                  <!-- <div class="form-group row">


                                  </div> -->
                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                                  <div class="form-group row">
                                    <label for="newAsigEmp" class="col-form-label col-form-label-sm col-sm-3">Responsable:</label>
                                    <div class="col-sm-9">
                                      <select class="form-control form-control-sm" id="newAsigEmp" name="newAsigEmp" style="width:100%">
                                        <option >Elije cliente</option>
            														<?php $prod = $con->query("SELECT * FROM empleado");
            															while ($row = $prod->fetch_assoc()) {
            																echo "<option value='".$row['id_emp']."' ";
            																echo ">";
            																echo $row['nom_emp'];
            																echo " ";
            																echo $row['ape_emp'];
            																echo "</option>";
            															}
            														?>
                                      </select>
                                    </div>
                                  </div>
                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                                  <div class="form-group row">
                                    <label for="newAsigArea" class="col-form-label col-form-label-sm col-sm-3">Ubicación :</label>
                                    <div class="col-sm-9">
                                      <select class="form-control form-control-sm" id="newAsigArea" name="newAsigArea" style="width:100%">
                                        <option value="">Elije ubicacion</option>
            														<?php $prod = $con->query("SELECT * FROM area");
            																while ($row = $prod->fetch_assoc()) {
            																	echo "<option value='".$row['id_area']."' ";
            																	echo ">";
            																	echo $row['nom_area'];
            																	echo "</option>";
            																}
            														?>
                                      </select>
                                    </div>
                                  </div>
                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->

                                </div>
                                <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                                <div class="col-sm-3">
                                  <div class="form-group row">
                                    <label for="newAsigCateg" class="col-form-label col-form-label-sm col-sm-3">T :</label>
                                    <div class="col-sm-9">
                                      <select class="form-control form-control-sm" id="newAsigCateg" name="newAsigCateg" style="width:100%" disabled>
                                        <option value="">Pertenece a...</option>
                                        <?php $ctg = $con->query("SELECT * FROM categoria");
                                            while ($row = $ctg->fetch_assoc()) {
                                              echo "<option value='".$row['id_categoria']."' ";
                                              echo ">";
                                              echo $row['nom_categoria'];
                                              echo "</option>";
                                            }
                                        ?>
                                      </select>
                                    </div>
                                  </div>
                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                                  <div class="form-group row">
                                    <label for="newAsigMarca" class="col-form-label col-form-label-sm col-sm-3">M :</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control form-control-sm" id="newAsigMarca" name="newAsigMarca" readonly>
                                    </div>
                                  </div>
                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                                  <div class="form-group row mb-0">
                                    <label for="newAsigContrat" class="col-form-label col-form-label-sm col-sm-3">Cto :</label>
                                    <div class="col-sm-9">
                                      <select class="form-control form-control-sm" id="newAsigContrat" name="newAsigContrat" style="width:100%" disabled>
                                        <option value="">Pertenece a...</option>
                                        <?php $ctg = $con->query("SELECT * FROM presentacion");
                                            while ($row = $ctg->fetch_assoc()) {
                                              echo "<option value='".$row['id_presentacion']."' ";
                                              echo ">";
                                              echo $row['nom_presentacion'];
                                              echo "</option>";
                                            }
                                        ?>
                                      </select>
                                    </div>
                                  </div>
                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->

                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->

                                </div>
                                <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                                <div class="col-sm-3">
                                  <div class="form-group row">
                                    <label for="" class="col-form-label col-form-label-sm col-sm-3">ELS :</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control form-control-sm" id="" name="">
                                    </div>
                                  </div>
                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                                  <div class="form-group row">
                                    <label for="" class="col-form-label col-form-label-sm col-sm-3">IP :</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control form-control-sm" id="" name="">
                                    </div>
                                  </div>
                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                                  <div class="form-group row mb-0">
                                    <label for="" class="col-form-label col-form-label-sm col-sm-3">MAC :</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control form-control-sm" id="" name="">
                                    </div>
                                  </div>
                                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                                </div>
                              </div>
                              <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                            </form>
                          </div>
                        </div>

                        <!-- 2da fila BOTONES  -->

                        <div class="row">

                          <div class="col-sm-12 text-center">

                            <button type="button" class="btn btn-sm btn-danger" id="btncleanAsig">
                              <i class="fas fa-broom fa-sm"></i>Limpiar
                            </button>
                            <button type="button" class="btn btn-sm btn-info" id="btnaddAsig">
                              <i class="fas fa-plus mr-2 fa-sm"></i>Agregar
                            </button>

                          </div>

                        </div>

                        <!-- 3ra fila BOTONES  -->

                        <div class="row mt-3">
                          <div class="col-sm-12">
                            <div id="TableAsigTempLoad"></div>
                          </div>
                        </div>

                      </div>


                    </div>

                  </div>
                  <!-- FIN DE CARD BODY -->


                </div>
              </div>
            </div>

            <!-- Content Row -->


          </div>
        </div>
        <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Your Website 2019</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
        <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
      </div>
      <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    </div>
    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->



    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    <?php include('scripts.php'); ?>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#tableAsig').load('../componentes/tableAssignment.php');
        $('#TableAsigTempLoad').load("../componentes/tableAssignmentTemp.php");
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#newAsigEmp').change(function() {
      			$.ajax({
      				url: '../procesos/empleado/readEmp.php',
      				type: 'POST',
      				data: "idemp=" + $('#newAsigEmp').val(),
      				success:function(r){
                var datos = $.parseJSON(r);

                $('#newAsigGerencia').val(datos['grempphp']);
      				}
      			})
  				});

          // para datos del Equipos
          $('#newAsigSerie').change(function() {
        			$.ajax({
        				url: '../../public/procesos/producto/readProducto.php',
        				type: 'POST',
        				data: "idprod=" + $('#newAsigSerie').val(),
        				success:function(r){
                  var datos = $.parseJSON(r);

                  $('#newAsigMarca').val(datos['ProdMarca']);
                  $('#newAsigModel').val(datos['ProdModel']);
                  $('#newAsigCateg').val(datos['ProdCtg']);
                  $('#newAsigContrat').val(datos['ProdPst']);
        				}
        			})
    				});

            // ---- Agregar equipo al Cesto --------
            $('#btnaddAsig').click(function() {
        			// vacios = validarFrmVacio('frmVentasProducto');
    					// if(vacios > 0){
    					// 	alertify.error("Debe llenar todos los campos!");
    					// 	return false;
    					// }
    					datos = $('#formNewAsignament').serialize();
    					$.ajax({
    						url: '../procesos/assignment/createAsigTemp.php',
    						type: 'POST',
    						data: datos,
    						success:function(r){
    							if (r==2) {
    								alertify.error('Ingrese un valor mayor');
    							}else if(r==1){
    								alertify.error('Ingrese un valor menor');
    							}else{
    								$('#TableAsigTempLoad').load("../componentes/tableAssignmentTemp.php");
    							}
    						}
    					})
    				});

            // --- Limpiar cesto de Equiupos -----------------------------
            $('#btncleanAsig').click(function() {
    		    	$.ajax({
    		    		url: '../procesos/assignment/deleteAsigTemp.php',
    		    		success:function(r){
    		    			$('#TableAsigTempLoad').load("../componentes/tableAssignmentTemp.php");
    		    		}
    		    	})
    		    });

      });
    </script>
    <script type="text/javascript">
      function RemoveArticle(index){
        $.ajax({
          url: '../procesos/assignment/deleteArticleTemp.php',
          type: 'POST',
          data: "ind=" + index,
          success:function(r){
            $('#TableAsigTempLoad').load("../componentes/tableAssignmentTemp.php");
            alertify.success("Se quito el Equipo");
          }
        })
      }
      function createAssig(){
        $.ajax({
    			url: '../procesos/assignment/createAsig.php',
    			success:function(r){
    				if (r > 0) {
    					$('#TableAsigTempLoad').load("../componentes/tableAssignmentTemp.php");
    					$('#formNewAsignament')[0].reset();
							$('#tableAsig').load('../componentes/tableAssignment.php');
    					alertify.alert("Se Asigno el Equipo");
    				}else if(r == 0){
    					alertify.alert("No hay equipos seleccionados");
    				}else{
    					alertify.error("No se pudo Asignar equipo");
    				}
    			}
    		})
      }
    </script>
  </body>
</html>
<?php
  }else{
    header('Location: ../../');
  }
?>
