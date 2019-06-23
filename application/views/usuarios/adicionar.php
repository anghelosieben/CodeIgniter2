
<?php

if(!$usuario==false)//es verdad existe
{
	echo "si";
	foreach ($usuario->result() as $user) 
	{	echo "<p>nombre:  ".$user->nombres." ".$user->apellidos."</p>";
		$ci=$user->ci;
		$dp=$user->id_dpersonales;
		echo $user->ci;

		if (!isset($user->username) && !isset($user->passw)) {
			echo '<form action="crearUsuario" class="form" method="get">
			<fieldset style="border: rgba(221, 212, 212, 0.7) 3px solid;padding:20px;display: inline;">
		    <legend style="border-bottom: 0px">adicionar usuario</legend>
		    	<input type="hidden" name="ci" value="'.$ci.'">
		    	<input type="hidden" name="dp" value="'.$dp.'">
			<div class="form-group">
				<label for="" >user</label>
				<input type="text" class="form-control" name="user" required>
			</div>
			<div>
				<label for="">password</label>
				<input type="text" class="form-control" name="passw" required>
			</div>
			<input type="submit" class="btn btn-success" value="crear usuario">
			</fieldset>
		</form>';
		}
		else{echo "el usuario ya esta creado: ".$user->username;}		
    }
}
else {echo "el usuario no existe";}


?>




