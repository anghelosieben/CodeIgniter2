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
              <p>usuario :<?php echo $this->session->userdata('usuario');?></p>
              <label for="">CONSULTAR CLIENTES</label>
              <div class="row">
              <div class="form-group col-xs-6">              
              <input type="text" id="ci" class="form-control" placeholder="introduzca datos del usuario" required autocomplete="off">
              </div>
              <div class="col-xs-6">
              <button id="btnusuario" class="btn btn-primary">Buscar Cliente</button>
              </div>
              </div>
            <div class="buscarprod form-group">
                <label for="">PRODUCTOS</label>                
                <input type="text" name="" id="autocompletar" class="form-control" placeholder="buscar productos..." autocomplete="off">

            </div>
            <div id="cont" style="background: #efe9e9;color: #0b0a0a;position: absolute;z-index: 20;width: 90%;padding: 0px 10px;">
              <!--lista de productos-->
            </div>

            <form action="guardar">
              <label for="">DATOS CLIENTES</label>
              <div id="usuario1" class="row">
                <!-- datos del usuario-->                              
                <div class="form-group col-xs-4">                                
                <input type='text' class="form-control" value='' name='ci3' required placeholder="ci">               
                </div>              
                <div class="form-group col-xs-4">
                <input type='text' class="form-control" name='nombre' placeholder='introduzca apellidos'>
                </div>
                <div class="form-group col-xs-4">                
                <input type='text' class="form-control" name='apellidos' required placeholder='introduzca nombres'>
                </div>                
              </div>
              <p><strong>NUMERO DE DOCUMENTO: </strong>
                <?php 
                  foreach ($num->result() as $row)
                        echo ($row->numero_doc+1)."<input type='hidden' name='ndoc' value='".($row->numero_doc+1)."'>";                      
                ?>
                
              </p>
                <input type="hidden" name="idusuario" value="<?php echo $this->session->userdata('id');?>">            
                <?php echo "<input type='hidden' name='fecha' value='".date('d-m-o')."'>"; ?>
              <div>                                
                <table class="table table-striped table-responsive">
                  <thead>
                  <tr>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>
                    <th>MONTO</th>
                    <th>ELIMINAR</th>
                  </tr>
                  </thead>
                  <tbody id="venta">
                    
                  </tbody>
                  <tfoot>
                    <tr>
                      <td></td>
                      <td></td>                      
                      <td><label for="">total a pagar</label></td>
                      <td><input type="text" id="total" name="total" type="text" value="0" readonly></td>
                    </tr>
                  </tfoot>
                </table>
                <input type="submit" id="finventa" class="btn btn-success" value="finalizar venta">
              </div>
              <div id="venta2">
                
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
    <div class="container">
</div>
</div>
<!-- Content Wrapper. Contains page content fin del contenido-->
<script type="text/javascript">  
  let a=document.getElementById("autocompletar")
  let v=document.getElementById("addventa")
  let u=document.getElementById("btnusuario")
  u.addEventListener("click",e => obtusuario(e))
  let form=document.getElementById("form")
  
  //z=Array.from(c)  
  //a.addEventListener("keyup",(e)=>agregar_elem(e))//agrega elementos en la vista//en desuso
  a.addEventListener("keyup",(e)=>agregar_elem2(e))
  function agregar_elem2(e)
  { let c=document.getElementById("cont")    //e.preventDefault()    
    console.log("jaj")
    let xhr=new XMLHttpRequest()
    xhr.open("GET","getproductos",true)
    xhr.addEventListener("load",(e)=>{
      console.log(e.target.responseText)
      j=e.target.responseText
      let output = JSON.parse(j);
      console.log("]*************"+output)
      let k=""
      if(a.value!="")
      {
          for (var i in output) 
          {
            console.log(output[i].nombre,a.value)
            console.log(output[i].nombre.indexOf(a.value))
            if(output[i].nombre.indexOf(a.value)>-1)//evalua si son contiene el valor
              { let p=output[i].id_producto+'*'+output[i].nombre+'*'+output[i].descripcion+'*'+output[i].precio
                k=k+'<a onclick="adi2(`'+p+'`)" style="display:block;color:black;padding:5px 0px;font-size:1.5rem;cursor: pointer;">'+p+'</a>'
              }
          }
          c.innerHTML=k
        }
          else {
            c.innerHTML=""
          }
    })
    //console.log(xhr)
    xhr.send()
  }
  function adi2(elem){console.log(elem)
    let v=document.getElementById("venta")
    let n=elem.split("*")
    console.log(n)
    etiqueta="<tr><td><input type='hidden' name='idprod[]' value='"+n[0]+"'>"+n[2]+"</td><td id='precio'><input type='hidden' name='precio[]' value='"+n[3]+"'>"+n[3]+"</td><td><input type='text' value='1' class='cantidades' name='cantidad[]' onkeyup='cambiar(this)'></td><td><input type='text' value='"+n[3]+"' name='monto[]' readonly='readonly' class='monto'></td><td><button id='quitar' class='btn btn-danger fa fa-remove' onclick='eliminar(event)'></button></td></tr>";///apend
    //$("#venta").append(etiqueta)
    v.insertAdjacentHTML("beforeend",etiqueta)
    //console.log($("#venta"))
    let c=document.getElementById("cont"),
        a=document.getElementById("autocompletar")
    c.innerHTML=""
    a.value=""
    suma()
  }

  
  function bueno(h,t){
    console.log(t,h)
  }
  function obtusuario(e){
    //console.log("123...")
    e.preventDefault()
    let u=document.getElementById("usuario1")
    let ci=document.getElementById("ci")
    console.log(ci.value)
    let xhr=new XMLHttpRequest()
    xhr.open("GET","obtenerdatosp?ci="+ci.value,true)
    xhr.addEventListener("load",(e)=>{
      console.log(e.target.responseText)
      u.innerHTML=e.target.responseText
    })
    xhr.send()
  }
  function eliminar(e)
  {
    console.log(e.target)
    //let tb=document.getElementById("venta")
    let tb=e.target.parentNode.parentNode.parentNode
    console.log(tb,e.target.parentNode.parentNode.parentNode)
    //console.log(e.target.parentNode.parentNode)
    tb.removeChild(e.target.parentNode.parentNode)
    suma()
  }
  
  function cambiar(k)//cambia el monto al modificar la cantidads
  { let padre=k.parentNode
    console.log(k,padre.previousElementSibling.textContent,padre.nextSibling.firstChild.value=padre.previousElementSibling.textContent*k.value)
    au=document.getElementById("autocompletar")
    console.log(au.previousElementSibling)
    suma()
  }
   function suma(){
    let q=Array.from(document.querySelectorAll(".monto"))
    console.log(q)
    let sum=0
    for(let i in q)
    { sum=sum+Number(q[i].value)
      console.log(Number(q[i].value))
    }
    document.getElementById("total").value=sum
   }


   function agregar_elem(e)
  {
    let c=document.getElementById("cont")    //e.preventDefault()    
    console.log("jaj")
    let xhr=new XMLHttpRequest()
    xhr.open("GET","getproductos",true)
    xhr.addEventListener("load",(e)=>{
      console.log(e.target.responseText)
      j=e.target.responseText
      let output = JSON.parse(j);
      console.log("]*************"+output)
      let k=""
      if(a.value!="")
      {
          for (var i in output) 
          {
            console.log(output[i].nombre,a.value)
            console.log(output[i].nombre.indexOf(a.value))
            if(output[i].nombre.indexOf(a.value)>-1)//evalua si son contiene el valor
              { let p=output[i].id_producto+'*'+output[i].nombre+'*'+output[i].precio
                k=k+'<p>'+output[i].nombre+' ' +output[i].precio+p+' <button class="btn btn-success fa fa-check" id="adicionarp" onclick="adi(`'+p+'`)"></button></p>'
              }
          }
          c.innerHTML=k
        }
          else {
            c.innerHTML=""
          }
    })
    //console.log(xhr)
    xhr.send()
  }
  function adi(k){
    console.log(k)
    //let a=document.getElementById("adicionarp")
    alert("jaja")
    //let k="jajaj"
    //console.log("nose de que hablan",a)
    let v=document.getElementById("venta")
    let n=k.split("*")
    console.log(n)
    etiqueta="<tr><td><input type='hidden' name='idprod[]' value='"+n[0]+"'>"+n[1]+"</td><td id='precio'><input type='hidden' name='precio[]' value='"+n[2]+"'>"+n[2]+"</td><td><input type='text' value='1' class='cantidades' name='cantidad[]' onkeyup='cambiar(this)'></td><td><input type='text' value='"+n[2]+"' name='monto[]' readonly='readonly' class='monto'></td><td><button id='quitar' class='btn btn-danger fa fa-remove' onclick='eliminar(event)'></button></td></tr>";///apend
    //$("#venta").append(etiqueta)
    v.insertAdjacentHTML("beforeend",etiqueta)
    //console.log($("#venta"))
    let c=document.getElementById("cont"),
        a=document.getElementById("autocompletar")
    c.innerHTML=""
    a.value=""
    suma()
  }
</script>