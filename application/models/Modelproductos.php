<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelproductos extends CI_Model {
	public function __construct()
	{	parent::__construct();
		$this->load->database();		
	}
	public function listar()
	{  return $consulta=$this->db->query("SELECT * FROM productos  ORDER BY id_producto ASC");
	}
	public function listar2()
	{  return $consulta=$this->db->query("SELECT * FROM productos");// se realiza consulta de los productos 
	//return $consulta=$this->db->query("SELECT * FROM productos p,inventarios i WHERE i.id_producto=p.id_producto ORDER BY p.id_producto ASC");
	}
	public function getprod($nombre)
	{  return $consulta=$this->db->query("SELECT * FROM productos WHERE nombre like'%$nombre%'");
	}
	public function obtener_prod($id)
	{  return $consulta=$this->db->query("SELECT * FROM productos WHERE id_producto=$id");
	}
	public function adicionar($data)
	{  $this->db->insert("productos",$data);
	}
	public function eliminar($id)
	{  	$this->db->where('id_producto',$id);
		$this->db->delete("productos");
	}
	public function eliminar2($id)
	{  	$this->db->query("UPDATE productos SET estado='false' WHERE id_producto=$id");	
	}
	public function getid(){
		$consulta=$this->db->query("SELECT id_producto FROM productos ORDER BY id_producto DESC LIMIT 1");
		if ($consulta->num_rows()>0 ) {
			return $consulta->row();
		}
		return false;
	}
	public function update($data,$id){
		$this->db->where('id_producto', $id);
		$this->db->update('productos',$data);

	}
}
?>