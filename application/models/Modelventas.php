<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelventas extends CI_Model {

	public function __construct()
	{	//parent::__construct();
		$this->load->database();		
	}
	public function obtener_num()
	{  return $this->db->query("SELECT max(numero_doc) AS numero_doc FROM ventas");
	}
	public function obtid($ndoc)
	{ $num=$this->db->query("SELECT id_venta FROM ventas WHERE numero_doc=$ndoc and estado=TRUE");
	  $row=$num->row();
	  return $row->id_venta;
	}
	public function guardar($data)
	{
		$this->db->insert("ventas",$data);
	}
}
?>
