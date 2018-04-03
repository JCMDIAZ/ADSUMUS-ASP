<?php
	if ( ! defined('BASEPATH')) exit('no se permite acceso directo al script');

	class Mdl_Consultas extends CI_Model{
		function __construct(){
			parent::__construct();
		}
        
        
        function Login($datos){
            $condicion = "Usuario = '".$datos['usuario']."' AND Contraseña = '".$datos['contraseña']."'";
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
            
            if($query->num_rows() > 0){
                return $query->result();
            }else{
                return false;
            }
        }
        
        function Ejecutivos(){
            $condicion = "Perfil = 'Ejecutivo'";
            $this->db->where($condicion);
            $query = $this->db->get('t_dat_usuarios');
            
            if($query->num_rows() > 0){
                return $query->result();
            }else{
                return false;
            }
        }
        
        function InsertarDatos($tabla,$datos){
            $query = $this->db->insert($tabla,$datos);
            
            $filasAfectadas = $this->db->affected_rows();
            if($filasAfectadas == 1){
                return true;
            }else{
                return false;
            }
        }
        
        // Obtiene el nombre del usuario 
        function NombreUsuario($id){
            $condicion = "id_usuario = ".$id;
            $this->db->where($condicion);
            $this->db->select('Usuario');
            $query = $this->db->get('t_dat_usuarios')->row()->Usuario;
            
            if($query != null){
                return $query;
            }else{
                return false;
            }
        }
        
        // Obtiene la descripcion del catalogo
        function DescripcionSelect($campo,$valor){
            $condicion = "Campo = '".$campo."' and Valor = ".$valor;
            $this->db->where($condicion);
            $this->db->select('Descripcion');
            $query = $this->db->get('t_cat_catalogos')->row()->Descripcion;
            
            if($query != null){
                return $query;
            }else{
                return false;
            }
        }
    }
?>