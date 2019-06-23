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
              <h3 class="box-title">Tabla de Usuarios  </h3><br>
               <a href="formulario" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true">Nuevo Usuario</i></a>              
            </div>
            <!-- /.box-header -->
            <div class="table-responsive box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>nombre</th>
                  <th>apellido</th>
                  <th>ci</th>
                  <th>user</th>
                  <th>pass</th> 
                  <th>estado</th>                  
                  <th>opciones</th>
                </tr>
                </thead>
                <tbody> 
                <?php
                		foreach ($usuarios->result() as $usuario) { ?>                               
                <tr>
                	<?php
                		 echo 	"<td>".$usuario->id_usuario."</td>";
                		 echo 	"<td>".$usuario->nombres."</td>";
                		 echo 	"<td>".$usuario->apellidos."</td>";
                     echo   "<td>".$usuario->ci."</td>";
                     echo   "<td>".$usuario->username."</td>";
                		 echo 	"<td>".$usuario->passw."</td>";
                		 echo "<td>".$usuario->estado."</td>
                		 <td>
                		 	<a href='' class='btn btn-primary' data-toggle='modal' data-target='#myModal'><i class='fa fa-eye' aria-hidden='true'></i></a>
		                    <a href='' class='btn btn-warning'><i class='fa fa-edit' aria-hidden='true'></i></a>
		                    <a href='delete/".$usuario->id_usuario."' class='btn btn-danger'><i class='fa fa-times' aria-hidden='true'></i></a>
		                </td>";              
                  	}

                	?> 
                </tr>            
                </tbody>
                <tfoot>
                <tr>
                  <th>Renderin</th>
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