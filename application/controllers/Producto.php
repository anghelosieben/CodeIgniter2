<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {
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
		$this->load->model('modelproductos');
		$this->load->model('modelinventarios');		
		$this->load->model('modelcategoria');		
		if(!$this->session->userdata('login'))
			redirect(base_url());
	}
	public function index()
	{	$data['productos']=$this->modelproductos->listar();
		$this->load->view('welcome_message',$data);
	}
	public function listar()//lista productos
	{	$data['productos']=$this->modelproductos->listar();
		$data['categorias']=$this->modelcategoria->listar();
		$this->load->view('layouts/header');	
		$this->load->view('layouts/aside');
		$this->load->view('productos/listar',$data);
		$this->load->view('layouts/footer');
	}
	public function adicionar()
	{	$data['categorias']=$this->modelcategoria->listar();
		$this->load->view('layouts/header');	
		$this->load->view('layouts/aside');
		$this->load->view('productos/adicionar',$data);
		$this->load->view('layouts/footer');		
	}
	public function add(){	//adiciona nuevo prod.		
		$this->form_validation->set_rules('descripcion', 'Descripcion', 'required|is_unique[productos.descripcion]');
		$this->form_validation->set_rules('nombre', 'Nombre', 'required[productos.nombre]');
		$this->form_validation->set_rules('precio', 'Precio', 'required[productos.precio]');
		if ($this->form_validation->run())
		{	$nombre= $this->input->post("nombre");
			$precio= $this->input->post("precio");
			$descripcion= $this->input->post("descripcion");
			$categoria= $this->input->post("categoria");
			//echo $precio.$nombre;
			$num=$this->modelproductos->getid();//obtengo el siguiente #id de la tabla productos y el id lo agrego en inventarios		    
			if ($num) {
				$id=$num->id_producto;
				$id=$id+1;				
			}else{echo "no se puede obtener el numero ";}			
			$data=["nombre"=>$nombre,
		  		"precio"=>$precio,
		  		"descripcion"=>$descripcion,"categoria_id"=>$categoria,"estado"=>'TRUE'];		  	
				$this->modelproductos->adicionar($data);
				$this->modelinventarios->adicionar($id);
				redirect(base_url().'producto/listar');
		}
		else{$this->adicionar();//se direcciona al controlador adicionar
			//echo "no cumple no se pudo guardar";
		}		
	}
	public function delete($id)
	{	//echo "eliminar".$id;
		//$this->modelproductos->eliminar($id);		
		$this->modelproductos->eliminar2($id);		

		redirect(base_url().'producto/listar');
	}
	public function modificar(){
		$producto=$_GET['producto'];		
		$data['producto']=$this->modelproductos->obtener_prod($producto);
		$data['categorias']=$this->modelcategoria->listar();		
		$this->load->view('productos/editar',$data);
	}
	public function update(){
		echo "update";
		$id=$_GET['id'];		
		$nombre=$_GET['nombre'];
		$descripcion=$_GET['descripcion'];
		$precio=$_GET['precio'];
		$categoria=$_GET['categoria'];
		$data=['nombre'=>$nombre,'descripcion'=>$descripcion,'precio'=>$precio,'categoria_id'=>$categoria];
		var_dump( $data);
		$this->modelproductos->update($data,$id);
		redirect(base_url().'producto/listar');
	}	
}
?>
