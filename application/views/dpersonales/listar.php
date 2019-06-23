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
              <h3 class="box-title">Datos Personales</h3>
               
            </div>
            <!-- /.box-header -->
            <div class="table-responsive box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id_producto</th>
                  <th>nombres</th>
                  <th>apellidos</th>
                  <th>email</th>
                  <th>telefono</th>                  
                  <th>opciones</th>
                </tr>
                </thead>
                <tbody> 
                <?php
                		foreach ($dpersonales->result() as $persona) { ?>                               
                <tr>
                	<?php
                		 echo 	"<td>".$persona->id_dpersonales."</td>";
                		 echo 	"<td>".$persona->nombres."</td>";
                		 echo 	"<td>".$persona->apellidos."</td>";
                		 echo 	"<td>".$persona->email."</td>";
                		 echo "<td>".$persona->telefono."</td>
                		 <td>
                		 	<a href='' class='btn btn-primary' data-toggle='modal' data-target='#myModal'><i class='fa fa-eye' aria-hidden='true'></i></a>
		                    <a href='' class='btn btn-warning'><i class='fa fa-edit' aria-hidden='true'></i></a>
		                    <a href='delete/".$persona->id_dpersonales."' class='btn btn-danger'><i class='fa fa-times' aria-hidden='true'></i></a>
		                </td>";              
                  	}

                	?> 
                </tr>            
                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                  <th>CSS</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <div class="container">
    
  
</div>
</div>
<!-- Content Wrapper. Contains page content fin del contenido-->