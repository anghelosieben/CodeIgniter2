<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelcategoria extends CI_Model {

	public function __construct()
	{	parent::__construct();
		$this->load->database();		
	}
    public function listar()
	{  return $this->db->query("SELECT id_categoria,nombre FROM categorias where estado='true'");		
	}
	
}
?>