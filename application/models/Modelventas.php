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
	public function adicionar($data)
	{
		$this->db->insert("ventas",$data);
	}
	public function listar()
	{	$query=$this->db->query("SELECT v.id_venta,v.fecha,v.total,v.numero_doc,d.nombres,d.apellidos,d.ci FROM ventas v, dpersonales d WHERE v.id_cliente=d.id_dpersonales
		ORDER BY fecha desc");
		return $query;
	}
	public function listar2()
	{	$query=$this->db->query("SELECT v.id_venta,v.fecha,v.total,v.id_cliente,v.id_usuario,v.numero_doc,d.nombres,d.apellidos,d.ci FROM ventas v,dpersonales d
		WHERE v.id_cliente=d.id_dpersonales ORDER BY v.fecha DESC");
		return $query;
	}
	public function mostrarventa($id)
	{ 	$query=$this->db->query("SELECT * FROM ventas v,dpersonales dp WHERE v.id_venta=$id and v.id_cliente=dp.id_dpersonales");
		//$query=$this->db->query("SELECT * FROM detalle_ventas d,ventas v,productos p,dpersonales dp WHERE d.venta_id=v.id_venta and d.producto_id=p.id_producto and v.id_cliente=dp.id_dpersonales");
		return $query;
	}
	public function mostrardetalle($id)
	{ $query=$this->db->query("SELECT d.venta_id,d.precio,d.cantidad,d.importe,p.descripcion FROM detalle_ventas d,productos p WHERE d.producto_id=p.id_producto and d.venta_id=$id");
		//"SELECT * FROM detalle_ventas d,ventas v,productos p,dpersonales dp WHERE v.id_venta=$id and d.venta_id=v.id_venta and d.producto_id=p.id_producto and v.id_cliente=dp.id_dpersonales");
		return $query;
	}
}
?>
