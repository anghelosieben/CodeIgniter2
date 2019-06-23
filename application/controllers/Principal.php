<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {
	public function __construct()
	{	parent::__construct();
		//cargar el mdelo
		//$this->load->model('modelproductos');
		//$this->load->library('form_validation');
		if(!$this->session->userdata('login'))
			redirect(base_url());
	}
	public function index()
	{	//$data['productos']=$this->modelproductos->listar();
		
		echo "usuario: ".$this->session->userdata('usuario');
		echo "id: ".$this->session->userdata('id');
		$this->load->view('layouts/header');	
		$this->load->view('layouts/aside');
		$this->load->view('admin/principal');
		$this->load->view('layouts/footer');	
	}
}
?>