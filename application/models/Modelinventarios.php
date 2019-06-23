<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelinventarios extends CI_Model {

	public function __construct()
	{	//parent::__construct();
		$this->load->database();		
	}
	public function listar()
	{  return $this->db->get("productos");		
	}
	public function adicionar($num)
	{  $this->db->query("INSERT INTO inventarios (id_producto,cantidad) VALUES($num,0)");
	}
	public function eliminar($id)
	{  	$this->db->where('id_producto',$id);
		$this->db->delete("productos");
	}
	
}
?>