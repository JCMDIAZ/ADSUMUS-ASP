<?php
	if ( ! defined('BASEPATH')) exit('no se permite acceso directo al script');

	class Mdl_Consultas extends CI_Model {
		function __construct(){
			parent::__construct();
		}
				// Obtener datos del servicio proporcionando codigo
				// de Activacion
				function Servicio($codigo,$tipo){
					$condicion = "Codigo_".$tipo." = '".$codigo."'";
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

				// Duplicar servicio
				function Duplicar($tabla,$id){
					$query = "INSERT INTO ".$tabla."(f_id_usuario,Razon_social_cliente,Nombre_solicitante,Correo_solicitante,
Direccion_cliente,Ubicacion_servicio,Telefono_solicitante,Tipo_servicio,Descripcion_servicio,
Ejecutivo_asignado,Observaciones,Material_utilizado) SELECT f_id_usuario,Razon_social_cliente,Nombre_solicitante,Correo_solicitante,
Direccion_cliente,Ubicacion_servicio,Telefono_solicitante,Tipo_servicio,Descripcion_servicio,
Ejecutivo_asignado,Observaciones,Material_utilizado FROM ".$tabla." WHERE id_servicio=".$id;
					$resultado = $this->db->query($query);
					if ($resultado == true) {
						return true;
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

				//
				function TiposCatalogos($campo){
					$this->db->where('Campo',$campo);
					$query = $this->db->get('t_cat_catalogos');

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
        // , cambia el estatus a iniciado o terminado y retorna los datos
        function InicioServicio($codigo,$tipo,$estatus){
            $condicion = "Codigo_".$tipo." = ".$codigo;
            // Actualizamos el estatus del servicio
            $this->db->set('Estatus_servicio', $estatus);
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

				// Actualiza el servicio con el folio(id) proporcionado
				function ActualizarServicio($data,$folio){
					$this->db->where('id_servicio',$folio);
					$query = $this->db->update('t_dat_servicios',$data);

					return ($this->db->affected_rows() == 1);
				}

				// Inserta el token con el folio(id) proporcionado
				function InsertarToken($data){
					$this->db->insert('t_dat_token',$data);

					return ($this->db->affected_rows() == 1);
				}

				// Obtiene el id_servicio del ultimo registro agregado
				function LastRow(){
					$this->db->select('id_servicio');
					$this->db->order_by('id_servicio','DESC');
					$this->db->limit(1);
					$query = $this->db->get('t_dat_servicios')->row()->id_servicio;

					if ($query != null) {
						return $query;
					}else{
						return false;
					}
				}

				// Traer todos los datos de una tabla o vista
				function Datos($tabla,$order){
					$this->db->order_by($order,'ASC');
					$query = $this->db->get($tabla);
					if ($query->num_rows()>0) {
						return $query->result();
					}else{
						return false;
					}
				}

				// Obtiene todos los datos de un registro
				function DatosRow($tabla,$columna,$valor){
					$this->db->where($columna,$valor);
					$query = $this->db->get($tabla);

					if ($query->num_rows() > 0) {
						return $query->result();
					}else{
						return false;
					}
				}

				// Funcion obtiene los datos del servicio respecto a su token asignado
				function ServicioToken($token){
					$this->db->select('*');
					$this->db->from('t_dat_servicios');
					$this->db->join('t_dat_token', 't_dat_servicios.id_servicio = t_dat_token.f_id_servicio', 'inner');
					$this->db->where('token', $token);
					$query = $this->db->get();

					if ($query->num_rows() == 1) {
						return $query->result();
					}else{
						return false;
					}
				}

				// Funcion que valida si una evaluacion ya existe
				function ExisteEvaluacion($id_servicio){
					$this->db->where('f_id_servicio', $id_servicio);
					$query = $this->db->get('t_dat_evaluacion');

					return ($query->num_rows() == 1);
				}

				// Elimina el token al efectuar la evaluacion o la no satisfacción del servicio
				function EliminarToken($tabla,$id_servicio){
					$this->db->where('f_id_servicio',$id_servicio);
					$this->db->delete($tabla);

					return($this->db->affected_rows() == 1);
				}

				// Obtiene el promedio de la evaluacion por servicio
				function EvaluacionServicio($tipo,$where){
					$consulta = "SELECT AVG(Pregunta_1) as Pregunta_1,AVG(Pregunta_2) as Pregunta_2,AVG(Pregunta_3) as Pregunta_3 FROM v_EvaluacionServicios WHERE $where = '$tipo';";
					$query = $this->db->query($consulta);
					if ($query->num_rows() == 1) {
						return $query->result();
					}else{
						return false;
					}
				}

				// Obtiene las evaluacion de todos los servicios de un determinado ejecutivo
				function EvaluacionEjecutivo($id,$where,$select){
					$this->db->where($where,$id);
					$this->db->select('Pregunta_1,Pregunta_2,Pregunta_3,Sugerencias,f_id_servicio,'.$select);
					$this->db->order_by('f_id_servicio','DESC');
					$this->db->limit(10);
					$query = $this->db->get('v_EvaluacionServicios');
					if ($query->num_rows()>0) {
						return $query->result();
					}else{
						return false;
					}
				}

				// Valida si el servicio le pertenece al ejecutivo
				function ValidarServicioEjecutivo($id_servicio,$id_ejecutivo,$codigo){
					$this->db->where("id_servicio",$id_servicio);
					$this->db->where("f_id_usuario",$id_ejecutivo);
					$this->db->where("Codigo_activacion",$codigo);
					$query = $this->db->get('t_dat_servicios');

					return($query->num_rows()==1);
				}

				// Retorna todos los valores de una columna sin que se repitan
				function ValoresDistintos($tabla,$columna){
					$consulta = "SELECT DISTINCT $columna FROM $tabla";
					$query = $this->db->query($consulta);

					if ($query->num_rows()>0) {
						return $query->result();
					}else{
						return false;
					}
				}
    }
?>
