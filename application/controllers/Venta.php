<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venta extends CI_Controller {
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
		$this->load->model('modeldpersonales');	
		$this->load->model('modelventas');	
		$this->load->model('modeldetalle');	
		if(!$this->session->userdata('login'))
			redirect(base_url());
	}
	public function index()
	{	$data['num']=$this->modelventas->obtener_num();
		//$this->load->view('welcome_message',$data);
		//echo "jajaj";
		$this->load->view('layouts/header');	
		$this->load->view('layouts/aside');
		$this->load->view('ventas/adicionar',$data);
		$this->load->view('layouts/footer');
	}
	public function getproductos(){//lista prod e inventarios
		//$data['productos']=$this->modelproductos->listar2();
		$data3=$this->modelproductos->listar2();
		//$this->load->view('ventas/listarprod',$data);
		echo json_encode($data3->result());
	}	
	public function obtenerdatosp()
	{	$ci=$this->input->get("ci");
		$users=$this->modeldpersonales->getusuario($ci);
		if($users->num_rows()>0)//cuenta el nuemro de filas de la consulta
		{ foreach($users->result() as $user) {
			$nombre=$user->nombres;
			$id=$user->id_dpersonales;			
			$apellidos=$user->apellidos;
			}
			   echo "<div class='form-group col-xs-4'>                                
                <input type='text' class='form-control' value='".$ci."' name='ci2' placeholder='ci' readonly>               
                </div>
                 <input type='hidden'value='".$id."' name='id_cliente'>               
                </div>
				<div class='form-group col-xs-4'>
                <input type='text' class='form-control' name='nombre' placeholder='introduzca apellidos' value='".$nombre."' readonly>
                </div>
                <div class='form-group col-xs-4'>                
                <input type='text' class='form-control' name='apellidos'placeholder='introduzca nombres' value='".$apellidos."' readonly>
                </div>";	
		}
		else{
			echo "
				<div class='col-xs-12' style='background:red;color:white;'><label>INGRESE DATOS DE USUARIO</label></div>
				<div>
				<div class='form-group col-xs-4'>                                
				<input type='text'class='form-control' value='".$ci."' name='ci3'>
				</div>
				<div class='form-group col-xs-4'>
                <input type='text' class='form-control' name='nombre' placeholder='introduzca apellidos'>
                </div>
                <div class='form-group col-xs-4'>                
                <input type='text' class='form-control' name='apellidos' required placeholder='introduzca nombres'>
				</div>
				</div>";            
		}
	}
	public function guardar()
	{	$apellidos=$this->input->get("apellidos");		
		$idcliente=$this->input->get("id_cliente");
		$ndoc=$this->input->get("ndoc");
		$idusuario=$this->input->get("idusuario");
		$precio=$this->input->get("precio");
		$cantidad=$this->input->get("cantidad");
		$idprod=$this->input->get("idprod");
		$monto=$this->input->get("monto");
		$total=$this->input->get("total");
		$fecha=$this->input->get("fecha");			
		echo "apellidos:".$apellidos." nro de doc:".$ndoc." idusuario:".$idusuario." idcliente:".$idcliente." total:".$total." fecha".$fecha."<br>";		
		//tenemos ci2 y ci3
		//1 preguntar si existe el usuario; por falso guardar nuevo ususario
		if ( $this->input->get("ci3")!=null) //verificamos si exsite ci3, luego guardamos en una variable
		{	if ( $this->input->get("nombre")!=null)
			{	$nombre=$this->input->get("nombre");
			} 
			else $nombre="";	
			$ci3=$this->input->get("ci3");//ci
			echo "ci usuario nuevo: ".$ci3."<br>";
			$data=["nombres"=>$nombre,"apellidos"=>$apellidos,"ci"=>$ci3,"estado"=>true];
			$this->modeldpersonales->adicionar($data);//guradar user
			$users=$this->modeldpersonales->getusuario($ci3);			
			$row = $users->row();
			if(isset($row)){
			  echo $row->id_dpersonales." ".$row->apellidos;
			  $idcliente=$row->id_dpersonales;
			}
		}
		else{
			$ci=$this->input->get("ci2");
			echo "este es el ci ".$ci;
		}

		echo "apellidos:".$apellidos." nro de doc:".$ndoc." idusuario:".$idusuario." idcliente:".$idcliente." total:".$total." fecha".$fecha."<br>";		
		//2 guardar datos de la venta	
		$dventas=["fecha"=>$fecha,"id_cliente"=>$idcliente,"id_usuario"=>$idusuario,"numero_doc"=>$ndoc,"total"=>$total,"estado"=>true];
		$this->modelventas->adicionar($dventas);
		$idventa=$this->modelventas->obtid($ndoc);
		//3 guardar los registros de ventas
		//obtener el idventa con el nro de doc_venta
		echo "<br>";
		for($i=0;$i<count($precio);$i++)
		{	echo "id prod".$idprod[$i]." ";
			echo "precio".$precio[$i]." ";
			echo "cantidad".$cantidad[$i]." ";
			echo "monto".$monto[$i]."<br>";
			$detallev=["producto_id"=>$idprod[$i],"precio"=>$precio[$i],"cantidad"=>$cantidad[$i],"importe"=>$monto[$i],"venta_id"=>$idventa];//ndoc
			$this->modeldetalle->guardar($detallev);//se guarda en la base de datos
		}
		echo $idventa;	
		redirect("venta/mostrar_venta/".$idventa);	
	}
	public function guardarventa($ndoc,$idusuario,$idcliente,$total,$fecha){
		$data=["fecha"=>$fecha,"id_cliente"=>$idcliente,"id_usuario"=>$idusuario,"total"=>$total,"numero_doc"=>$ndoc,"estado"=>true];
		$this->modelventas->adicionar($data);
	}
	public function venta_realizada()
	{	echo "venta finalizada";
		redirect("venta/mostrar_venta/10");
		//$this->mostrar_venta();
		///mostrar la venta realizada por el cliente
		///despues de guardar las ventas se debe listar las mismas id_venta y ci_cliente 
	}
	public function listar()
	{	$data['ventas']=$this->modelventas->listar2();
		$this->load->view('layouts/header');	
		$this->load->view('layouts/aside');
		$this->load->view('ventas/listarventas',$data);
		$this->load->view('layouts/footer');
	}
	public function mostrar_venta($id)//$ventaid)
	{	//aca mostraremos como mostrar la venta realizada se mostrar una descripcion de dicha venta
		$data['venta']=$this->modelventas->mostrarventa($id);
		$data['detalles']=$this->modelventas->mostrardetalle($id);//$ventaid);
		//var_dump($this->modelventas->mostrardetalle(4)->result());
		$this->load->view('layouts/header');	
		$this->load->view('layouts/aside');
		$this->load->view('ventas/generarventa',$data);
		$this->load->view('layouts/footer');
	}
}
?>
