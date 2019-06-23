<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta charset="utf-8">
	<meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap/bootstrap.css">
	<style type="text/css">
	   .form{width: 350px;margin: 0 auto;background: rgba(0,0,0,0.8);margin-top: 100px;padding: 20px;color:white;} 
	   .form h1{text-align: center;}
	   body{background: url("<?php echo base_url()?>assetsfotos/ciudad.jpg");width: 100%;height: 100%; background-size: cover;}
	   .container{padding: 0px;}
	   hr{border: green 2px solid;}
    
	</style>
</head>
<body>

<div class="container">
  <div class="form">
  	<h1>LOGIN</h1>  	
  	<hr>
  <form action="index.php/autenticar/auth" method="post">
    <? //echo base_url();?>
    <div class="form-group has-feedback">
      <label for="email">Usuario:</label>
      <input type="text" class="form-control" id="usuario" name="usuario" placeholder="introduzca usuario" required>
    </div>
    
    <div class="form-group">
      <label for="pwd">Contraseña:</label>
      <input type="password" class="form-control" id="pwd" name="password" placeholder="contraseña" required>
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-primary form-control">Ingresar</button>
    </div>
</form> 

<?php  //imprimimos errores de login
      if($this->session->flashdata("error"))
      {
      ?>
        <div class="alert alert-danger">
          <p>
            <?php echo $this->session->flashdata("error"); ?>
          </p>
        </div>
    <?php
      }
    ?>
</div>	
</div>

</body>
</html>