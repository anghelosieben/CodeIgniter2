<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modeldpersonales extends CI_Model {

	public function __construct()
	{	parent::__construct();
		$this->load->database();		
	}
	public function listar()
	{  return $this->db->get("dpersonales");		
	}
	public function adicionar($data)
	{  $this->db->insert("dpersonales",$data);
	}
	public function eliminar($id)
	{  	$this->db->where('id_dpersonales',$id);
		$this->db->delete("dpersonales");
	}
	public function getusuario($ci)
	{ return $this->db->query("SELECT * FROM dpersonales WHERE ci='$ci'");
	}
	
}
?>