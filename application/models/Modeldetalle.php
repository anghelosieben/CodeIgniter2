<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modeldetalle extends CI_Model {

	public function __construct()
	{	//parent::__construct();
		$this->load->database();		
	}
	public function guardar($data)
	{
		$this->db->insert("detalle_ventas",$data);
	}
	public function mostrardetalle($ventaid)
	{
		$query=$this->db->query("SELECT * FROM detalle_ventas d,ventas v,productos p,dpersonales dp WHERE d.venta_id=v.id_venta and d.producto_id=p.id_producto and v.id_cliente=dp.id_dpersonales");
		return $query;
	}
}
?>