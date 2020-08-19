 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Usuarios</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalUsuarios">
        Agregar Usuario
      </button>
	      <div class="modal fade" id="modalUsuarios">
	        <div class="modal-dialog modal-lg">
	          <div class="modal-content">
	            <div class="modal-header bg-success">
	              <h4 class="modal-title">Registrar usuario</h4>
	              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	              </button>
	            </div>
	            <div class="modal-body" >
		            <form id="formUsuarios" method="POST">
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
		              		<label>Rol de Usuario</label>
				     			<select class="form-control" type="text" name="rol" id="rol">
				     				<option value="">Seleccione Rol de Usuario</option>
				     			</select>	
				     	</div>
				       	<br>
				        <div class="col-sm-6">
				        	<label>Correo</label>	
				     			<input class="form-control" type="text" name="correo" id="correo">
				     	</div>
				      </div>
				  	  </br>
				      <div class="row">
				        <div class="col-sm-6">
				        	<label>Contraseña</label>	
				     			<input class="form-control" type="text" name="contraseña" id="contraseña">
				     	</div>
				       	<br>
				        <div class="col-sm-6">
				        	<label>Confirma Contraseña</label>	
				     			<input class="form-control" type="text" id="confirmcontraseña" name="confirmcontraseña">
				     	</div>
				      </div>
	            </div>
	            <div class="modal-footer">
	              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	              <button type="submit" class="btn btn-success" id="GuardarUsuario">Guardar</button>
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
			<div class="card card-warning">
	              <div class="card-header">
	                <h3 class="card-title">Usuarios Registrados</h3>
	              </div>
	              <!-- /.card-header -->
	              <div class="card-body">
	                <table id="example1" class="table table-bordered table-striped">
	                  <thead>
	                  <tr>
	                    <th>#</th>
	                    <th>Nombre</th>
	                    <th>Apellido Paterno</th>
	                    <th>Apellido Materno</th>
	                    <th>Rol</th>
	                    <th>Correo</th>
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

  <div class="modal fade" id="modalUsuariosEditar">
	        <div class="modal-dialog modal-lg">
	          <div class="modal-content">
	            <div class="modal-header bg-primary">
	              <h4 class="modal-title">Editar usuario</h4>
	              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	              </button>
	            </div>
	            <div class="modal-body">
		            <form id="formUsuariosEditar" method="POST">
		            	<input class="form-control" type="hidden" name="id_usuario" id="id_usuario">
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
		              		<label>Rol de Usuario</label>
				     			<select class="form-control" type="text" name="rolEd" id="rolEd">
				     				<option value="">Seleccione Rol de Usuario</option>
				     			</select>	
				     	</div>
				       	<br>
				        <div class="col-sm-6">
				        	<label>Correo</label>	
				     			<input class="form-control" type="text" name="correoEd" id="correoEd">
				     	</div>
				      </div>
				  	  </br>
				      <div class="row">
				        <div class="col-sm-6">
				        	<label>Cambiar contraseña</label>	
				     			<input class="form-control" type="text" name="contraseñaEd" id="contraseñaEd">
				     	</div>
				       	<br>
				        <div class="col-sm-6">
				        	<label>Confirma Contraseña</label>	
				     			<input class="form-control" type="text" id="confirmcontraseñaEd" name="confirmcontraseñaEd">
				     	</div>
				      </div>
	            </div>
	            <div class="modal-footer">
	              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	              <button type="submit" class="btn btn-primary" id="GuardarUsuarioEd">Guardar Cambios</button>
	            </div>
		            </form>
	          </div>
	          <!-- /.modal-content -->
	        </div>
	        <!-- /.modal-dialog -->
	      </div>
	      <!-- /.modal -->

