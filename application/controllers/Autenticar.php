<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autenticar extends CI_Controller {
	public function __construct()
	{	parent::__construct();
		//cargar el mdelo
		$this->load->model('modelusuarios');
		
	}
	public function index()
	{	if(!$this->session->userdata('login'))	//verifica si esta logueado tiene valores true or false
			{echo "esta deslogueao";$this->load->view('admin/login.php');}
		else {echo "esta logueao"; 	
				redirect(base_url().'principal/index');				
			 }
						
	}
	public function auth()
	{
      $password= $this->input->post('password');
      $usuario= $this->input->post('usuario');
      $resultado=$this->modelusuarios->login($password,$usuario);

      if($resultado){ //capturamos mensajes de login para el usuario en sesiones
      	$data=array('id' => $resultado->id_usuario, 'usuario' => $resultado->username,'login' => true );//array con los datos del usuario
      	echo $data['id'];
      	$this->session->set_userdata($data);
      	redirect(base_url().'principal/index');//quitamos el index.phpprincipal/index
      }
      else{//capturamos la mensaje de error
	      	$this->session->set_flashdata("error","el usuario o contraseña son incorrectos");
	      	redirect(base_url());
		  }
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
		echo "jajaja";
	}
}

?>