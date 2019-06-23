<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelusuarios extends CI_Model {

	public function __construct()
	{	//parent::__construct();
		$this->load->database();		
	}
	public function login($user,$password){
	//echo $user;
		$query=$this->db->query("SELECT * FROM usuarios WHERE username='$user' AND passw='$password' and estado=true");
		if($query->num_rows() > 0 )
	    {	//echo "true";
			return $query->row();
	    }
	    else{return false;}
	}


    public function listar()
	{  return $this->db->query("SELECT u.id_usuario,d.id_dpersonales,d.nombres,d.apellidos,d.ci,u.username,u.passw,u.estado,u.id_rol FROM dpersonales d,usuarios u WHERE d.id_dpersonales=u.id_dpersonales");		
	}
	public function obtenerU($ci)
	{	//devuelve la existencia de un suario
		$query=$this->db->query("SELECT * FROM usuarios u,dpersonales d WHERE d.ci='$ci' and d.id_dpersonales=u.id_dpersonales");//existe en usuarios??
		if($query->num_rows() > 0 )
			{  $consulta=$this->db->query("SELECT d.nombres,d.apellidos,d.ci,d.id_dpersonales,u.username,u.passw,u.estado,u.id_rol FROM dpersonales d,usuarios u WHERE d.id_dpersonales=u.id_dpersonales and d.ci='$ci'");
					return $consulta;
			}
		else 
			{   $c=$this->db->query("SELECT * FROM dpersonales WHERE ci='$ci'");
				if($c->num_rows() > 0 )
				{
				$consulta=$this->db->query("SELECT * FROM dpersonales WHERE ci='$ci'");
						return $consulta;
			    }
			    else{return false;}
			}
	}
	public function adicionar($ci,$user,$passw,$idp){
		$query=$this->db->query("INSERT INTO usuarios (ci,username,passw,estado,id_dpersonales) VALUES('$ci','$user','$passw',true,$idp)");
	}
}
?>