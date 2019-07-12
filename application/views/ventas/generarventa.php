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
            <div class="table-responsive box-body">					
            <h1>NOTA DE ENTREGA</h1>
              <?php 
              //var_dump($detalles->result());
              foreach($venta->result() as $venta)
                {echo $venta->id_venta." ".$venta->id_cliente." ".$venta->total." ".$venta->nombres." ".$venta->apellidos;
                  $total=$venta->total;
                  $ci=$venta->ci;
                  $cliente=$venta->nombres." ".$venta->apellidos;
                  $fecha=$venta->fecha;
                }  
                
              ?>
							<p>informacion de la venta</p>  
							<p>imprenta milton</p>
							<p>nro</p>
							<p>nit</p>
							<p>direccion</p>
							<p>telefono</p>
							<p>fecha <?php echo $fecha;?></p>
							  cliente <?php echo $cliente;?>
                nit/ci  <?php echo $ci;?>
                <p>Señores:.........................</p>
                <table class="table">
                <thead>
									<tr>
										<th>CANTIDAD</th>
										<th>DETALLE</th>
										<th>P.UNIT.</th>										
										<th>TOTAL</th>
									</tr>
                </thead>
                <tbody>
                
                  <?php
                  //echo var_dump($detalles->result());
                  //echo count($detalles);
                   foreach($detalles->result() as $detalle)
                    echo "<tr>
                    <td>".$detalle->cantidad."</td>
                    <td>".$detalle->descripcion."</td>
                    <td>".$detalle->precio."</td>
                    <td>".$detalle->importe."</td>
                    </tr>";                    
                  ?>
									<tr>
										<td></td>
										<td></td>										
										<td>total a pagar</td>
										<td><?php echo $total;?></td>
									</tr>
                </tbody>
                </table>
                son mil bolivianos °°/°°<br>
                entregue conforme<br>
                ci<br>
                recibi conforme<br>
                ci<br>
                gracias por su preferencia<br>
                
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
      dahsjdgahsgd
  
    </div>
</div>
<!-- Content Wrapper. Contains page content fin del contenido-->