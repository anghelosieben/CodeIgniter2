<!-- Content Wrapper. Contains page content inicio del contenido-->
  <div class="content-wrapper">
<section class="content-header">
      <h1>
        Sistema de Ventas, Compras
        <small>Imprenta Milton</small>
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
              <h3 class="box-title">Agregar Nuevos Usuarios</h3>
                            
            </div>
            <!-- /.box-header -->

			<div class="col-xs-12">
             <form action="add" method="POST">
             	<div class="form-group">
					      <label for="nombre">introduzca el nombre del producto</label>
             		<input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo set_value("nombre");?>" required placeholder='nombre del producto'>                             		
             	</div>
              <div class="form-group">
                <label for="descripcion">introduzca la descripcion del producto</label>
                <input type="text" name="descripcion" class="form-control" id="descripcion" value="<?php echo set_value("descripcion");?>" required placeholder='descripcion del producto'> 
                <?php 
                   echo form_error("descripcion","<span class='help-block alert alert-danger'>","</span>");
                ?>                
              </div>	             	
             	<div class="form-group">
					     <label for="precio">Introduzca precio del producto eje 5,50</label>
             		<input type="number" name="precio" class="form-control" value="<?php echo set_value("precio");?>" placeholder="precio del producto" step="0.001">
                 <?php 
                   echo form_error("precio","<span class='help-block alert alert-danger'>","</span>");
                ?> 
             	</div>
              <div class="form-group">
                <div class="col-xs-1"><label for="">categoria</label></div>
                <div class="col-xs-6">
                  <select name="categoria" id="categoria" class="form-control">
                    <?php foreach ($categorias->result() as $categoria)
                         echo  '<option value="'.$categoria->id_categoria.'">'.$categoria->nombre.'</option>';                          
                    ?>
                  </select>
                </div>    
              </div>

              <input type="text" class="" name="fecha" value="<?php echo "fecha";?>">
              
              <div class="form-group col-xs-12">
             	    <input type="submit" class="btn btn-info" value="guardar">
              </div>
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