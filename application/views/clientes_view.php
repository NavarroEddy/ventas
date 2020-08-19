  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Clientes</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalClientes">
        Agregar Cliente
      </button>
	      <div class="modal fade" id="modalClientes">
	        <div class="modal-dialog modal-lg">
	          <div class="modal-content">
	            <div class="modal-header bg-info">
	              <h4 class="modal-title">Registrar Cliente</h4>
	              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	              </button>
	            </div>
	            <div class="modal-body" >
		            <form id="formClientes" method="POST">
		              <div class="row">
		              	<div class="col-sm-4">	
		              		<label>Nombre/s</label>
				     			<input class="form-control" type="text" name="nombre">
				     			<label for="nombre" class="error" style="display:none;"></label>
				     	</div>
				       	<br>
				        <div class="col-sm-4">
				        	<label>Apellido Paterno</label>	
				     			<input class="form-control" type="text" name="apaterno">
				     	</div>
				       	<br>
				        <div class="col-sm-4">
				        	<label>Apellido Materno</label>	
				     			<input class="form-control" type="text" name="amaterno">
				     	</div>
				      </div>
				      </br>
				      <div class="row">
		              	<div class="col-sm-6">	
		              		<label>Telefono</label>
				     			<input class="form-control" type="text" name="telefono" id="telefono">	
				     	</div>
				       	<br>
				        <div class="col-sm-6">
				        	<label>Correo</label>	
				     			<input class="form-control" type="text" name="correo">
				     	</div>
				      </div>
				  	  </br>
				      <div class="row">
				        <div class="col-sm-12">
				        	<label>Dirección</label>	
				     			<textarea class="form-control" type="text" name="direccion" id="direccion" rows="4"></textarea>
				     	</div>  	
				      </div>
	            </div>
	            <div class="modal-footer">
	              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	              <button type="submit" class="btn btn-info" id="GuardarCliente">Guardar</button>
	            </div>
		            </form>
	          </div>
	          <!-- /.modal-content -->
	        </div>
	        <!-- /.modal-dialog -->
	      </div>
	      <!-- /.modal -->
	  </br>
	  </br>
          <!-- Form Element sizes -->
      <div class="row">
      	<div class="col-sm-6">
			
		</div>
		<div class="col-sm-12">
			<div class="card card-info">
	              <div class="card-header">
	                <h3 class="card-title">Clientes Registrados</h3>
	              </div>
	              <!-- /.card-header -->
	              <div class="card-body">
	                <table id="tb_clientes" class="table table-bordered table-striped">
	                  <thead>
	                  <tr>
	                    <th>#</th>
	                    <th>Nombre</th>
	                    <th>Apellido Paterno</th>
	                    <th>Apellido Materno</th>
	                    <th>Dirección</th>
	                    <th>Telefono</th>
	                    <th>Correo</th>
	                    <th>Puntos</th>
	                    <th>Limite de credito</th>
	                    <th>Estado</th>
	                    <th>Acciones</th>
	                  </tr>
	                  </thead>
	                </table>
	              </div>
	              <!-- /.card-body -->
	            </div>
	          </div>
            <!-- /.card -->
	  </div>
	    <!-- /.card -->
    </section>
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="modalClientesEditar">
	        <div class="modal-dialog modal-lg">
	          <div class="modal-content">
	            <div class="modal-header bg-info">
	              <h4 class="modal-title">Editar Cliente</h4>
	              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	              </button>
	            </div>
	            <div class="modal-body">
		            <form id="formClientesEditar" method="POST">
		            	<input class="form-control" type="hidden" name="id_cliente" id="id_cliente">
		              <div class="row">
		              	<div class="col-sm-4">	
		              		<label>Nombre/s</label>
				     			<input class="form-control" type="text" name="nombreEd" id="nombreEd">
				     	</div>
				       	<br>
				        <div class="col-sm-4">
				        	<label>Apellido Paterno</label>	
				     			<input class="form-control" type="text" name="apaternoEd" id="apaternoEd">
				     	</div>
				       	<br>
				        <div class="col-sm-4">
				        	<label>Apellido Materno</label>	
				     			<input class="form-control" type="text" name="amaternoEd" id="amaternoEd">
				     	</div>
				      </div>
				      </br>
				      <div class="row">
		              	<div class="col-sm-6">	
		              		<label>Telefono</label>
				     			<input class="form-control" type="text" name="telefonoEd" id="telefonoEd">	
				     	</div>
				       	<br>
				        <div class="col-sm-6">
				        	<label>Correo</label>	
				     			<input class="form-control" type="text" name="correoEd" id="correoEd">
				     	</div>
				      </div>
				  	  </br>
				      <div class="row">
				        <div class="col-sm-12">
				        	<label>Dirección</label>	
				     			<textarea class="form-control" type="text" name="direccionEd" id="direccionEd" rows="4"></textarea>
				     	</div>
				      </div>
	            </div>
	            <div class="modal-footer">
	              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	              <button type="submit" class="btn btn-info" id="GuardarClienteEd">Guardar Cambios</button>
	            </div>
		            </form>
	          </div>
	          <!-- /.modal-content -->
	        </div>
	        <!-- /.modal-dialog -->
	      </div>
	      <!-- /.modal -->

