<?php
	if ( ! defined('BASEPATH')) exit('no se permite acceso directo al script');

	class Mdl_Consultas extends CI_Model{
		function __construct(){
			parent::__construct();
		}
				// Obtener datos del servicio proporcionando codigo
				// de Activacion
				function Servicio($codigo){
					$condicion = "Codigo_activacion = '".$codigo."'";
					$this->db->where($condicion);
					$query = $this->db->get('t_dat_servicios');
					if ($query->num_rows() == 1) {
						return $query->result();
					}else{
						return false;
					}
				}

				// Obtener datos del servicio proporcionando
				// el numero de folio (id_servicio)
				function ServicioFolio($codigo){
					$condicion = "id_servicio = ".$codigo;
					$this->db->where($condicion);
					$query = $this->db->get('t_dat_servicios');
					if ($query->num_rows() == 1) {
						return $query->result();
					}else{
						return false;
					}
				}

        function Login($datos){
            $condicion = "Correo = '".$datos['correo']."' AND Contraseña = '".$datos['contraseña']."'";
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

        // Verifica el codigo de activacion, inserta la fecha de inicio del servicio
        // , cambia el estatus a iniciado y retorna los datos
        function InicioServicio($codigo){
            $condicion = "Codigo_activacion = ".$codigo;
            // Actualizamos el estatus del servicio
            $this->db->set('Estatus_servicio', 'Iniciado');
            $this->db->where($condicion);
            $this->db->update('t_dat_servicios');

            // Obtenemos los datos del registro del codigo activacion proporcionado
            $this->db->where($condicion);
            $query = $this->db->get('t_dat_servicios');


            if($query->num_rows() == 1){
                return $query->result();
            }else{
                return false;
            }
        }

				function ActualizarServicio($data,$folio){
					$this->db->where('id_servicio',$folio);
					$query = $this->db->update('t_dat_servicios',$data);

					return ($this->db->affected_rows() == 1);
				}
    }
?>
