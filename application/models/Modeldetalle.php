<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modeldetalle extends CI_Model {

	public function __construct()
	{	parent::__construct();
		$this->load->database();		
	}
	public function guardar($data)
	{
		$this->db->insert("detalle_ventas",$data);
	}
}
?>