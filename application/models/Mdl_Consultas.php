<?php
	if ( ! defined('BASEPATH')) exit('no se permite acceso directo al script');

	class Mdl_Consultas extends CI_Model{
		function __construct(){
			parent::__construct();
		}
        
        function Login($datos){
            $condicion = "Usuario = '".$datos['usuario']."' AND Contrasena = '".$datos['contraseña']."'";
            $this->db->where($condicion);
            $query = $this->db->get('t_dat_usuarios');
            
            if($query->num_rows()==1){
                return $query->result();
            }else{
                return false;
            }
        }
        
        function Select($tabla,$campo){
            $condicion = "Campo = '".$campo."' OR Campo = 'Blanco' ORDER BY Valor,Campo ASC";
            $this->db->where($condicion);
            $query = $this->db->get($tabla);
            
            if($query->num_rows()>0){
                return $query->result();
            }else{
                return false;
            }
        }
    }
?>