<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dpersonales extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{	parent::__construct();
		//cargar el mdelo
		$this->load->model('modeldpersonales');
		if(!$this->session->userdata('login'))
			redirect(base_url());
	}
	public function index()
	{	//$data['productos']=$this->modelproductos->listar();
		$this->load->view('dpersonales/formulario');
	}
	public function listar()//lista productos
	{	$data['dpersonales']=$this->modeldpersonales->listar();
		$this->load->view('layouts/header');	
		$this->load->view('layouts/aside');
		$this->load->view('dpersonales/listar',$data);
		$this->load->view('layouts/footer');		
	}
	public function adicionar()
	{
		$this->load->view('layouts/header');	
		$this->load->view('layouts/aside');
		$this->load->view('dpersonales/formulario');
		$this->load->view('layouts/footer');	
	
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

