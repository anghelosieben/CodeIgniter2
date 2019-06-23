<!-- Content Wrapper. Contains page content inicio del contenido-->
  <div class="content-wrapper">
<section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>      
</section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
               <a href="" class="btn btn-success" data-toggle="modal" data-target="#myModal">adicionar<i class="fa fa-plus" aria-hidden="true"></i></a>              
            </div>
            <!-- /.box-header -->

			<div class="col-xs-12">
             <form action="add" method="POST">
             	<div class="form-group">
					      <label for="nombres">Nombres:</label>
             		<input type="text" name="nombre" class="form-control" value="<?php echo set_value("nombre");?>" required> 
                <?php 
                   echo form_error("nombre","<span class='help-block'>","</span>");
                ?>            		
             	</div>	
             	<div class="form-group">
					<label for="precio">Apellidos:</label>
             	<input type="text" name="apellidos" class="form-control" placeholder="apellidos" value="<?php echo set_value("apellidos");?>">
             	</div>
              <div class="form-group">
                <label for="ci">introduzca el carnet de identidad:</label>
                <input type="ci" name="ci" class="form-control" placeholder="" value="<?php echo set_value("ci");?>" required> 
                <?php 
                   echo form_error("ci","<span class='help-block alert alert-danger'>","</span>");
                ?>                            
              </div> 
              <div class="form-group">
                <label for="direccion">direccion:</label>
                <input type="direccion" name="direccion" class="form-control" placeholder="direccion" value="<?php echo set_value("direccion");?>" required>                             
              </div>

              <div class="form-group">
                <label for="telefono">telefono:</label>
                <input type="text" name="telefono" class="form-control" value="<?php echo set_value("telefono");?>">                                
              </div>
              <div class="form-group">
                <label for="email">email:</label>
                <input type="email" name="email" class="form-control" placeholder="email@correo.com" value="<?php echo set_value("email");?>">                             
              </div>               
              
               <div class="form-group"> 
               <label for="ci">seleccione lugar de procedencia</label>         
                <select name="ciudad" id="">
                  <option>La Paz</option>
                  <option>oruro</option>
                  <option>santa cruz</option>
                  <option>cochabamba</option>
                </select>                             
              </div>                           	
             	    <input type="submit" class="btn btn-info" value="guardar">
             </form>
			</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
</div>
<!-- Content Wrapper. Contains page content fin del contenido-->