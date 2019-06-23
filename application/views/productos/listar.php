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
              <h3 class="box-title">Tabla de Productos</h3>
              <br>
               <a href="adicionar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true">Producto Nuevo</i></a>
                             
            </div>
            <!-- /.box-header -->
            <div class="table-responsive box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id_producto</th>
                  <th>nombre</th>
                  <th>detalle</th>
                  <th>precio</th>
                  <th>categoria</th>                  
                  <th>opciones</th>
                </tr>
                </thead>
                <tbody> 
                <?php
                		foreach ($productos->result() as $producto) { ?>                               
                <tr>
                	<?php
                		 echo 	"<td>".$producto->id_producto."</td>";
                		 echo 	"<td>".$producto->nombre."</td>";
                		 echo 	"<td>".$producto->descripcion."</td>";
                		 echo 	"<td>".$producto->precio."</td>";
//                     <button type='button' href='' class='edit btn btn-warning' data-toggle='modal' data-target='#modal-default' value='".$producto->id_producto.",".$producto->nombre.",".$producto->descripcion.",".$producto->precio.",".$producto->categoria_id."'><i class='fa fa-edit' aria-hidden='true'></i></button>

                		 echo "<td>".$producto->categoria_id."</td>
                		 <td>
                		 	<a href='' class='btn btn-primary' data-toggle='modal' data-target='#myModal'><i class='fa fa-eye' aria-hidden='true'></i></a>
		                  <button type='button' class='edit btn btn-warning' data-toggle='modal' data-target='#modal-default' value='".$producto->id_producto."'><i class='fa fa-edit' aria-hidden='true'></i></button>

		                  <a href='delete/".$producto->id_producto."' class='btn btn-danger'><i class='fa fa-times' aria-hidden='true'></i></a>
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

      <!--<button type='button' class='btn btn-default' data-toggle='modal' data-target='#modal-default'>Launch Default Modal</button>-->

     <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
                <div id="formulario-editar">                
                  
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>                

              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
</div>
<!-- Content Wrapper. Contains page content fin del contenido-->

<script type="text/javascript">
  let ed=document.body//realizare una delegaion de eventos al captura cualquier click
  ed.addEventListener("click",function(e){        
    if(e.target.classList[0]=='edit')//voy a trabajar solo con los que tengas class[0]=edit
      { console.log(e.target,e.target.value)        
        let producto=e.target.value
        let xhr=new XMLHttpRequest()
        xhr.open("GET","modificar?producto="+producto,true)        
        //xhr.addEventListener("load",(e)=>{console.log(e.target.responseText)})
        xhr.onreadystatechange = function() {
          if(xhr.status==200 && xhr.readyState==4)
            {console.log(xhr,xhr.responseText)
             let formularioedit=document.getElementById("formulario-editar")        
             formularioedit.innerHTML=xhr.response
            }
        }
       //console.log(xhr)
        xhr.send()
        /*console.log(e.target.value.split(","))
        let producto=e.target.value.split(",")
        let formularioedit=document.getElementById("formulario-editar")        
        formularioedit.innerHTML='<form action="" class="form"><div class="form-group"><input type="text" class="form-control" readonly="readonly" name="id" value="'+producto[0]+'" id="idp"></div><div class="form-group"><input type="text" name="nombre" class="form-control" value="'+producto[1]+'" id="nombre"></div><div class="form-group"><input type="text" id="descripcion" name="descripcion" class="form-control" value="'+producto[2]+'"></div><div class="form-group"><input id="precio" name="precio" type="text" class="form-control" value="'+producto[3]+'"></div><div class="form-group"><select id="descripcion" name="descripcion" class="form-control"><option value="'+producto[4]+'">'+producto[4]+'</option></select></div><div style="text-align:right"><input type="submit" value="finalizar" class="btn btn-primary"></div></form>'*/
      }    
  })
</script>