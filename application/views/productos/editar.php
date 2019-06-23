<?php
echo '
<form action="update" method="GET" class="form">';
	foreach ($producto->result() as $prod)
	{
echo '<div class="form-group">
		<input type="text" class="form-control" readonly="readonly" name="id" value="'.$prod->id_producto.'" id="idp">
	</div>
	<div class="form-group">
		<label>Nombre Producto</label>
		<input type="text" name="nombre" class="form-control" value="'.$prod->nombre.'" id="nombre">
	</div>
	<div class="form-group">
		<label>Descripcion del Producto</label>
		<input type="text" id="descripcion" name="descripcion" class="form-control" value="'.$prod->descripcion.'">
	</div>
	<div class="form-group">
		<label>Precio del Producto</label>
		<input id="precio" name="precio" type="text" class="form-control" value="'.$prod->precio.'">
	</div>
	<div class="form-group">
		<label>Categoria</label>
		<select id="descripcion" name="categoria" class="form-control">';			
			foreach ($categorias->result() as $categoria)
	         { 
	         if($prod->categoria_id==$categoria->id_categoria)
	         	echo  '<option value="'.$categoria->id_categoria.'" selected>'.$categoria->nombre.'</option>';	
	         else 
	         	echo  '<option value="'.$categoria->id_categoria.'">'.$categoria->nombre.'</option>';
	         }
		echo '</select>
	</div>
	<input type="text" class="" name="fecha" value="fecha">
	<div style="text-align:right">
		<input type="submit" value="guardar" class="btn btn-primary">
	</div>';
	}
echo '</form>';
?>