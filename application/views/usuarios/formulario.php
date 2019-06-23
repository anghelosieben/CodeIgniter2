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
              <h3 class="box-title">Adicionar Nuevos Usuarios</h3>
              <br>
                             
            </div>
            <!-- /.box-header -->

			<div class="col-xs-12">
             <form id="form">
             	
              <div class="form-group">
                <label for="ci">introduzca el carnet de identidad:</label>
                <input type="ci" id="ci" name="ci" class="form-control" placeholder="introduzca ci" value="<?php echo set_value("ci");?>" palceholder="" required> 
                <?php 
                   echo form_error("ci","<span class='help-block alert alert-danger'>","</span>");
                ?>                            
              </div> 
                                        	
             	    <input type="submit" class="btn btn-info" value="consultar" id="enviar">
             </form>
             <div id="contenedor"></div>
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
<script>
  let form=document.getElementById("form");
  let contenedor=document.getElementById("contenedor");
  let enviar=document.getElementById("enviar");
  let ci=document.getElementById("ci");
  enviar.addEventListener("click",(e)=>{
    form.addEventListener("submit",(e)=>{e.preventDefault()})
    let carnet=ci.value
    console.log(carnet)
    ajax(carnet)
  })
  
  let ajax=(ci)=>{
    let xhr=new XMLHttpRequest()
    let url='adicionar?ci='+ci
    //console.log(url)
    xhr.open("get",url,true) 
    
    xhr.addEventListener("load",(e)=>{
      console.log(e.target)  
      contenedor.innerHTML=e.target.responseText
    })
    xhr.send()
  }
</script>