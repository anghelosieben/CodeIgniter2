<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
	
	public function __construct()
	{	parent::__construct();
		//cargar el mdelo
		$this->load->model('modelusuarios');
		if(!$this->session->userdata('login'))
			redirect(base_url());
	}
	public function index()
	{	//$data['productos']=$this->modelproductos->listar();
		$this->load->view('usuarios/formulario');
	}
	public function listar()//lista productos
	{	$data['usuarios']=$this->modelusuarios->listar();
		$this->load->view('layouts/header');	
		$this->load->view('layouts/aside');
		$this->load->view('usuarios/listar',$data);
		$this->load->view('layouts/footer');		
	}
	public function formulario()
	{
		$this->load->view('layouts/header');	
		$this->load->view('layouts/aside');
		$this->load->view('usuarios/formulario');
		$this->load->view('layouts/footer');	
	
	}
	public function adicionar()
	{
		//cho "mensaje desde el conrolador usuario";
		$ci= $this->input->get("ci");

		$data['ci']=$this->input->get("ci");
		$usuario=$this->modelusuarios->obtenerU($ci);
		//echo $usuario->passw;
		$data['usuario']=$usuario;
		$this->load->view('usuarios/adicionar',$data);
	}
	public function crearUsuario()//creamos el nuevo usuario 
	{	$ci= $this->input->get("ci");
		$user= $this->input->get("user");
		$passw= $this->input->get("passw");
		$idp= $this->input->get("dp");
		$usuario=$this->modelusuarios->adicionar($ci,$user,$passw,$idp);
		redirect(base_url().'usuario/listar');
		echo $ci.$user.$passw;
	}


	public function add(){		

		$this->form_validation->set_rules('ci', 'Ci', 'required|is_unique[dpersonales.ci]');
		if ($this->form_validation->run())
		{	$nombre=$this->input->post("nombre");
			$apellidos=$this->input->post("apellidos");
			$ciudad=$this->input->post("ciudad");
			$ci=$this->input->post("ci");
			$email=$this->input->post("email");
			$direccion=$this->input->post("direccion");
			$telefono=$this->input->post("telefono");			
			$data=["nombres"=>$nombre,"apellidos"=>$apellidos,"nacionalidad"=>$ciudad,"ci"=>$ci,"estado"=>true,"email"=>$email,"telefono"=>$telefono,"direccion"=>$direccion];		  		
			$this->modeldpersonales->adicionar($data);

				//redirect(base_url().'index.php/welcome/listar');
		}
		else{
			
			$this->adicionar();	
			echo "errro al cargar datos!!!! no cumple";
		}
		//$this->listar();
		redirect(base_url().'dpersonales/listar');
		//echo $direccion;
	}
	public function delete($id)
	{
		echo "eliminar".$id;
		$this->modeldpersonales->eliminar($id);
		//$this->listar();
		redirect(base_url().'dpersonales/listar');
	}
	
}

?>