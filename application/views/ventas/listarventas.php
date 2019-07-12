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
              <h3 class="box-title">Ventas</h3>
                            
            </div>
            <!-- /.box-header -->
            
<table class="table">
<thead>
	<th>id</th>
	<th>fecha</th>
	<th>id cliente</th>
	<th>nombres</th>
	<th>apellidos</th>
	<th>ci</th>
	<th>id usuario</th>
	<th>total</th>
	<th>num. doc</th>
</thead>
<?php
	foreach ($ventas->result() as $venta) {
		echo "<tr>
			<td>".$venta->id_venta."</td>
			<td>".$venta->fecha."</td>
			<td>".$venta->id_cliente."</td>
			<td>".$venta->nombres."</td>
			<td>".$venta->apellidos."</td>
			<td>".$venta->ci."</td>
			<td>".$venta->id_usuario."</td>
			<td>".$venta->total."</td>
			<td>".$venta->numero_doc."</td>
			<td><a href='mostrar_venta/".$venta->id_venta."' btn btn-default>ver</a></td>
			<td><a href='#' btn btn-default>eliminar</a></td>
			<td><a href='#' btn btn-default>modificar</a></td>
			</tr>";	
	}
	
?>
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