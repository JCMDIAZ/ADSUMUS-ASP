<?php
date_default_timezone_set('America/Monterrey');
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_Principal extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Mdl_funciones');
		$this->load->model('Mdl_Consultas');
    $this->load->library('email');
	}

		public function Index(){
			$datos['ejecutivos'] = $this->Mdl_Consultas->Ejecutivos();
			$datos['Tipos'] = $this->Mdl_funciones->Tipos();
			$datos['mostrar'] = $this->Mdl_funciones->Mostrar('t_dat_servicios');
			$datos['tablas'] = $this->Mdl_funciones->o_tabla();
			$this->load->view('sview_Header');
			$this->load->view('sview_ListadoServicios',$datos);
			$this->load->view('sview_Footer');
		}

	//Inicio del Modulo Usuarios
		public function ModuloU(){
			$datos['Tipos'] = $this->Mdl_funciones->Tipos();
			$this->load->view('sview_Header');
			$this->load->view('sview_ModuloU',$datos);
			$this->load->view('sview_Footer');
		}
	//Fin del Modulo Usuarios

		public function add(){
			$this->form_validation->set_rules('Usuario1', 'nombre', 'required|min_length[3]|max_length[50]',
	                        array('required' => '¡El %s es requerido!',
																'min_length' => '¡El %s debe tener minimo 3 caracteres!',
																'max_length' => '¡El %s debe tener maximo 50 caracteres!',
																));
			$this->form_validation->set_rules('Contraseña1', 'contraseña', 'required|min_length[6]|max_length[20]',
	                        array('required' => '¡La %s es requerida!',
																'min_length' => '¡La %s debe tener minimo 6 caracteres!',
																'max_length' => '¡La %s debe tener maximo 20 caracteres!',
																));
	    $this->form_validation->set_rules('Contraseña2', 'Confirmar Contraseña', 'required|matches[Contraseña1]',
			  array('required' => 'Error en %s.',
							'matches' => '¡Las contraseñas no coinciden!',
							));
			$this->form_validation->set_rules('Correo1', 'Correo', 'required|valid_email|is_unique[t_dat_usuarios.Correo]',
													array('required' => 'Escribe el %s',
																'valid_email' => '¡Verifique el %s!',
																'is_unique' => '¡%s existente!',
																));
			if ($this->form_validation->run() == true) {
			$this->load->model('Mdl_funciones');
			$this->Mdl_funciones->insertPrueba();
			echo json_encode('Agregado Correctamente');
			}else{
				echo json_encode(validation_errors());
				}
		}

		public function Levantamiento(){
        $this->form_validation->set_rules('nombre_solicitante','Nombre del Solicitante', 'required');
        $this->form_validation->set_rules('ejecutivo_asignado','Ejecutivo', 'required');
        $this->form_validation->set_rules('correo_solicitante','Correo', 'required');

        if($this->form_validation->run() == false){
            $data['tipo_servicio'] = $this->Mdl_Consultas->Select('t_cat_catalogos','Tipo_servicio');
            $data['ejecutivos'] = $this->Mdl_Consultas->Ejecutivos();
            $data['estatus'] = $this->Mdl_Consultas->Select('t_cat_catalogos','Estatus_servicio');
            $this->load->view('sview_Header');
            $this->load->view('mview_LevServicio',$data);
            $this->load->view('sview_Footer');
        }else{
            $data['f_id_usuario'] = $this->input->post('ejecutivo_asignado');
            $data['Ejecutivo_asignado'] = $this->Mdl_Consultas->NombreUsuario($data['f_id_usuario']);
            $data['Razon_social_cliente'] = limpiarEspacios($this->input->post('razon'));
            $data['Nombre_solicitante'] = $this->input->post('nombre_solicitante');
            $data['Correo_solicitante'] = $this->input->post('correo_solicitante');
            $data['Direccion_cliente'] = $this->input->post('direccion_cliente');
            $data['Ubicacion_servicio'] = $this->input->post('ubicacion_servicio');
            $data['Telefono_solicitante'] = $this->input->post('telefono_solicitante');
            if($this->input->post('tipo_servicio') != null){
                $data['Tipo_servicio'] = $this->Mdl_Consultas->DescripcionSelect('Tipo_servicio',$this->input->post('tipo_servicio'));
            }
            $data['Descripcion_servicio'] = $this->input->post('descripcion_servicio');
            $data['Fecha_cita_programada'] = $this->input->post('fecha_cita_programada');
            $data['Codigo_activacion'] = NumeroAleatorio();
            $data['Codigo_terminacion'] = NumeroAleatorio();
            $insertar = $this->Mdl_Consultas->InsertarDatos('t_dat_servicios',$data);
            if($insertar == true){
							// Manda correo con los codigos de activacion y terminacion, asi como el ejecutivo asignado
							$Idservicio = $this->Mdl_Consultas->LastRow();
							$servicio = $this->Mdl_Consultas->ServicioFolio($Idservicio);
							// Manda el correo al cliente
							foreach ($servicio as $valor) {
	                $para = $data['Correo_solicitante'];
	                $asunto = "Datos sobre el servicio - Adsumus";
	                $body = "<html><head><title>Servicio</title>
											<style>
										    body{
										      margin: 0;
										    }
										    div.navegador{
										      width: 100%;
										      height: 50px;
										      position: fixed;
										      top: 0;
										      background-color: #2B2B28;
										      padding: 10px;
													position: relative;
										    }
										    div.logo{
										      background-image: url(http://repair.adsumus.com.mx/img/adsumus-logo.png);
										      height: 55px;
										      width: 150px;
										      margin-right: 30px;
										      background-size: contain;
										      background-position: center;
										      background-repeat: no-repeat;
										    }
												div.contenedor{
													position: absolute;
													margin-top: 10px;
												}
										  </style></head><body><div class='navegador'>
										    <div class='logo'>
										    </div>
										  </div>".
													"<div class='contenedor'><p>Folio del servicio: ".$valor->id_servicio."<br><br>Código de Activación: ".
													$data['Codigo_activacion']."<br><br>Código de Terminación: ".$data['Codigo_terminacion'].
													"<br><br>Ingeniero asignado: ".$data['Ejecutivo_asignado']."</p></div>".
													"</body></html>";

	                $config['mailtype'] = 'html';
	                $this->email->initialize($config);
	                $this->email->from('noreply@repair.adsumus.com.mx','Adsumus');
	                $this->email->to($para);
	                $this->email->subject($asunto);
	                $this->email->message($body);
								}
                if($this->email->send()){
                    echo '<script> aux = confirm("Se levanto correctamente el servicio \n Desea agregar uno nuevo?");
                    if(aux== true){
                        window.location.href = "'.base_url().'Levantamiento_servicio";
                    }else{
                        window.location.href = "'.base_url().'Inicio";
                    }
                    </script>';
                }else{
                    echo $this->email->print_debugger();
                    echo $para;
                }

								// Manda el correo al Ingeniero
								$ingeniero = $this->Mdl_Consultas->DatosRow('t_dat_usuarios','id_usuario',$data['f_id_usuario']);
								$para = $data['Correo_solicitante'];
								$asunto = "Nuevo servicio asignado - Adsumus";
								$body = "<html><head><title>Servicio asignado</title><style>
									body{
										margin: 0;
									}
									div.navegador{
										width: 100%;
										height: 50px;
										position: fixed;
										top: 0;
										background-color: #2B2B28;
										padding: 10px;
										position: relative;
									}
									div.logo{
										background-image: url(http://repair.adsumus.com.mx/img/adsumus-logo.png);
										height: 55px;
										width: 150px;
										margin-right: 30px;
										background-size: contain;
										background-position: center;
										background-repeat: no-repeat;
									}
									div.contenedor{
										position: absolute;
										margin-top: 10px;
									}
									</style></head><body><div class='navegador'>
										<div class='logo'>

										</div>
									</div>".
												"<div class='contenedor'><p><b>Folio del servicio:</b> ".$valor->id_servicio.
												"<br><br><b>Nombre del cliente:</b>".$valor->Nombre_solicitante.
												"<br><br><b>Descripcion del servicio:</b> ".$data['Descripcion_servicio']."</p></div>".
												"</body></html>";

								$config['mailtype'] = 'html';
								$this->email->initialize($config);
								$this->email->from('noreply@repair.adsumus.com.mx','Adsumus');
								$this->email->to($ingeniero[0]->Correo);
								$this->email->subject($asunto);
								$this->email->message($body);
								$this->email->send();
            }else{
                echo '<script>alert("Ocurrio un Error al Levantar el Servicio");</script>';
            }
        }
    }

    public function AtencionServicio(){
        $this->form_validation->set_rules('activacion', 'Activacion', 'required|min_length[4]');

         if($this->form_validation->run() == false){
             redirect('Inicio');
         }else{
					 	$clave = $this->input->post('idSeleccionado');
             $activacion = $this->input->post('activacion');
						 // valida que exista un servicio con el codigo de activacion proporcionado
             $servicioValido = $this->Mdl_Consultas->Servicio($activacion,'activacion');
						 $ejecutivo = $this->session->userdata('ID');
						 $servicioSelect = $this->Mdl_Consultas->ServicioFolio($clave);
						 if($servicioValido != false){
							 // Valida el codigo de activacion con el con codigo de activacion seleccionado
							 if ($servicioSelect[0]->Codigo_activacion == $servicioValido[0]->Codigo_activacion) {
							 foreach ($servicioValido as $value) {
								 // Valida que el servicio sea el correspondiente con el ejecutivo actual
								 $servicioEjecutivo = $this->Mdl_Consultas->ValidarServicioEjecutivo($value->id_servicio,$ejecutivo,$activacion);
								 if ($servicioEjecutivo == false) {
									 echo '<script>alert("Este servicio no se te ha asignado")</script>';
 			 					 	 echo '<script>window.location.href = "'.base_url().'Inicio";</script>';
								 }else{
								 $estatus_servicio = $value->Estatus_servicio;
								 switch ($estatus_servicio) {
								 	case 'Terminado':
										echo '<script>alert("El servicio ha sido completado")</script>';
								  	echo '<script>window.location.href = "'.base_url().'Inicio";</script>';
								 		break;
								 	case 'Iniciado':
										$data['servicio'] = $servicioValido;
										$data['tipo_servicio'] = $this->Mdl_Consultas->Select('t_cat_catalogos','Tipo_servicio');
										$data['ejecutivos'] = $this->Mdl_Consultas->Ejecutivos();
										$data['estatus'] = $this->Mdl_Consultas->Select('t_cat_catalogos','Estatus_servicio');
										$this->load->view('sview_Header');
										$this->load->view('mview_AtencionServicio',$data);
										$this->load->view('sview_Footer');
										break;
									case 'Pendiente':
										$data['servicio'] = $servicioValido;
										$data['tipo_servicio'] = $this->Mdl_Consultas->Select('t_cat_catalogos','Tipo_servicio');
										$data['ejecutivos'] = $this->Mdl_Consultas->Ejecutivos();
										$data['estatus'] = $this->Mdl_Consultas->Select('t_cat_catalogos','Estatus_servicio');
										$this->load->view('sview_Header');
										$this->load->view('mview_AtencionServicio',$data);
										$this->load->view('sview_Footer');
										break;
									case 'Solicitado':
										$data['servicio'] = $this->Mdl_Consultas->InicioServicio($activacion,'activacion','Iniciado');
										$data['tipo_servicio'] = $this->Mdl_Consultas->Select('t_cat_catalogos','Tipo_servicio');
										$data['ejecutivos'] = $this->Mdl_Consultas->Ejecutivos();
										$data['estatus'] = $this->Mdl_Consultas->Select('t_cat_catalogos','Estatus_servicio');
										$this->load->view('sview_Header');
										$this->load->view('mview_AtencionServicio',$data);
										$this->load->view('sview_Footer');
										break;
								 	default:
								 		echo "<script>alert('Ocurrio un error con el servicio solicitado');</script>";
								 		break;
								 }
							 }
						 }
					 }else{
						 echo '<script>alert("Codigo Activacion Incorrecto")</script>';
						 echo '<script>window.location.href = "'.base_url().'Inicio";</script>';
					 }
         }else{
					 echo '<script>alert("No existe un servicio con el código de activación proporcionado")</script>';
					 echo '<script>window.location.href = "'.base_url().'Inicio";</script>';
				 }
    	}
		}

		public function ActualizarServicio($folio){
			$data['Observaciones'] = $this->input->post('observaciones');
			$data['Material_utilizado'] = $this->input->post('material_utilizado');
			$servicio = $this->Mdl_Consultas->ServicioFolio($folio);
			foreach ($servicio as $columna) {
				// Valida que por lo menos un campo ha sido modificado
				if ($columna->Observaciones != $data['Observaciones'] OR $columna->Material_utilizado != $data['Material_utilizado'] OR $columna->Fecha_cita_posterior != $this->input->post('fecha_cita_posterior')) {
					// validamos si se introdujo la fecha de cita posterior y de ser asi,
					// el estatus del servicio se cambia a "Pendiente"
					if ($this->input->post('fecha_cita_posterior') != null) {
						$data['Fecha_cita_posterior'] = $this->input->post('fecha_cita_posterior');
						$data['Estatus_servicio'] = 'Pendiente';
						$actualizacion = $this->Mdl_Consultas->ActualizarServicio($data,$folio);
						if ($actualizacion == true) {
							echo 'pendiente';
						}else{
							echo 'error';
						}
					}else{
						$actualizacion = $this->Mdl_Consultas->ActualizarServicio($data,$folio);
						if ($actualizacion == true) {
							echo 'ok';
						}else{
							echo 'error';
						}
					}
				}else{
					echo 'error';
				}
			}
		}

		public function TerminarServicio(){
			$this->form_validation->set_rules("terminacion","Código de terminación","required|max_length[4]");
			if ($this->form_validation->run() == false) {

			}else{
					$id = $this->input->post('servicio_id');
					$datos['Fecha_cita_posterior'] = $this->input->post('fecha_cita_posterior2');
					$datos['Observaciones'] = $this->input->post('observaciones2');
					$datos['Material_utilizado'] = $this->input->post('material_utilizado2');
					$this->Mdl_Consultas->ActualizarServicio($datos,$id);
					$terminacion = $this->input->post('terminacion');
					$resultado = $this->Mdl_Consultas->ServicioFolio($id);
						foreach ($resultado as  $valor) {
							if ($valor->Codigo_terminacion === $terminacion) {
								// Valores que se insertan en la tabla de token's
								$data['f_id_servicio'] = $id;
								$data['token'] = CrearToken();
								$today = date('y:m:d');
								// Agrega 5 dias a la fecha actual
								$data['fecha_limite'] = date('y:m:d',strtotime("+5 days"));
								$tokenResult = $this->Mdl_Consultas->InsertarToken($data);

								// Cambia el estatus a terminado
								$servicio = $this->Mdl_Consultas->InicioServicio($terminacion,'terminacion','Terminado');

								// Se envia el email al solicitante
								$para = $valor->Correo_solicitante;
								$asunto = "Finalizacion del servicio - Adsumus";
								$body = "<html><head><title>Servicio asignado</title><style>
									body{
										margin: 0;
									}
									div.navegador{
										width: 100%;
										height: 50px;
										position: fixed;
										top: 0;
										background-color: #2B2B28;
										padding: 10px;
										position: relative;
									}
									div.logo{
										background-image: url(http://repair.adsumus.com.mx/img/adsumus-logo.png);
										height: 55px;
										width: 150px;
										margin-right: 30px;
										background-size: contain;
										background-position: center;
										background-repeat: no-repeat;
									}
									div.contenedor{
										position: absolute;
										margin-top: 10px;
									}
									</style></head><body><div class='navegador'>
										<div class='logo'>

										</div>
									</div>".
												"<div class='contenedor'><p>El servicio con folio: #".$id." ha finalizado.<br> Le pedimos atentamente contestar la evaluación del servicio o la no satisfacción de éste para así poder seguir mejorando dia con dia.<br><br>Link para encuesta del servicio - <a href='".base_url()."Encuesta/".$data['token']."'>".base_url()."Encuesta/".$data['token']."</a></div>".
												"</body></html>";
								$this->email->set_mailtype('html');
								$this->email->from('noreply@repair.adsumus.com.mx', 'Adsumus');
								$this->email->to($para);
								$this->email->subject($asunto);
								$this->email->message($body);

								if ($this->email->send()) {
									echo '<script> aux = alert("Se finalizo correctamente el servicio");
											window.location.href = "'.base_url().'Inicio";
											</script>';
								}else{
									echo $this->email->print_debugger();
									echo $para;
								}
							}else{
								echo '<script>alert("Código de activación erróneo");
										</script>';
										$data['servicio'] = $resultado;
										$data['tipo_servicio'] = $this->Mdl_Consultas->Select('t_cat_catalogos','Tipo_servicio');
										$data['ejecutivos'] = $this->Mdl_Consultas->Ejecutivos();
										$data['estatus'] = $this->Mdl_Consultas->Select('t_cat_catalogos','Estatus_servicio');
										$this->load->view('sview_Header');
										$this->load->view('mview_AtencionServicio',$data);
										$this->load->view('sview_Footer');
							}
						}
				}
		}

		public function Encuesta($token){
			$validarToken = $this->Mdl_Consultas->ServicioToken($token);
			if ($validarToken != false) {
				$this->form_validation->set_rules('evaluar', 'Evaluar','required');
				if ($this->form_validation->run()==false) {
					$data['token'] = $token;
					$this->load->view('mview_Encuesta',$data);
				}else{
					$this->session->set_flashdata('tokenServicio',$token);
					$respuesta = $this->input->post('evaluar');
					if ($respuesta==1) {
						redirect(base_url().'Encuesta/Evaluacion_servicio/1');
					}else{
						redirect(base_url().'Encuesta/No_satisfaccion_servicio/2');
					}
				}
			}else{
				$data['titulo'] = 'Encuesta';
				$data['mensaje'] = 'ADVERTENCIA: Ya se realizó la encuesta de este servicio';
				$this->load->view('mview_NoExiste',$data);
			}
		}
		public function Evaluacion_servicio(){
			$token = $this->session->flashdata('tokenServicio');
			$this->form_validation->set_rules("evaluacion","Evaluacion","required");
			$this->form_validation->set_rules("evaluacion2","Evaluacion","required");
			$this->form_validation->set_rules("evaluacion3","Evaluacion","required");
			$this->form_validation->set_rules("sugerencias","Sugerencias","max_length[250]");
			if ($this->form_validation->run()==false) {
				$validarToken = $this->Mdl_Consultas->ServicioToken($token);
				// Validamos si existe el token proporcionado
				if ($validarToken != false) {
					foreach ($validarToken as $valor) {
						$id_servicio = $this->Mdl_Consultas->ExisteEvaluacion($valor->id_servicio);
					}
					// Validamos si no se ha evaluado anteriormente el servicio
					if ($id_servicio == false) {
						foreach ($validarToken as $valor) {
							$data['token'] = $token;
							$idServicio = $valor->f_id_servicio;
							$this->session->set_flashdata('idServicio',$idServicio);
							$this->load->view('mview_EvaluacionServicio',$data);
							$this->Mdl_Consultas->EliminarToken('t_dat_token',$idServicio);
						}
					}else{
						$data['titulo'] = 'Evaluación del servicio prestado';
						$data['mensaje'] = 'ADVERTENCIA: El servicio ya ha sido evaluado';
						$this->load->view('mview_NoExiste',$data);
					}
				}else{
						$data['titulo'] = 'Evaluación del servicio prestado';
						$data['mensaje'] = 'ADVERTENCIA: El servicio ya ha sido evaluado o el link ha caducado';
						$this->load->view('mview_NoExiste',$data);
				}
			}else{
						$idServicio = $this->session->flashdata('idServicio');
						$data['f_id_servicio'] = $idServicio;
						$data['Pregunta_1'] = $this->input->post('evaluacion');
						$data['Pregunta_2'] = $this->input->post('evaluacion2');
						$data['Pregunta_3'] = $this->input->post('evaluacion3');
						$data['Sugerencias'] = $this->input->post('sugerencias');
						$resultado = $this->Mdl_Consultas->InsertarDatos('t_dat_evaluacion',$data);
						if ($resultado==true) {
							$this->load->view('mview_SuccessEval');
						}else{
							$data['titulo'] = 'Evaluación del servicio prestado';
							$data['mensaje'] = 'ADVERTENCIA: El servicio ya ha sido evaluado o el link ha caducado';
							$this->load->view('mview_NoExiste',$data);
						}
			}
		}

		public function No_satisfaccion(){
				$token = $this->session->flashdata('tokenServicio');
				$registro = $this->Mdl_Consultas->ServicioToken($token);
				$this->form_validation->set_rules('detalle','Detalle','required|max_length[500]');
				$this->form_validation->set_rules('fecha','Fecha de cita posterior','required|max_length[500]');
				if ($this->form_validation->run()==false) {
					if ($registro == false) {
						$data['token'] = $token;
						$data['titulo'] = 'No satisfacción del servicio';
						$data['mensaje'] = 'ADVERTENCIA: El link ha caducado';
						$this->load->view('mview_NoExiste',$data);
					}else{
						foreach ($registro as $valor) {
							// Valida si el registro ya ha sido reabierto
							if ($valor->id_servicio_anterior === '0') {
								$data['mensaje'] = 'Favor de verificar su nuevo numero de folio del servicio';
								$data['titulo'] = 'No satisfacción del servicio';
								echo "<script>alert('El servicio con folio ".$valor->id_servicio." ya ha sido reabierto')</script>";
								$this->load->view('mview_NoExiste',$data);
							}else{
								$data['folio'] = $valor->id_servicio;
								$servicio = $valor->f_id_servicio;
								$this->session->set_flashdata('idServicio',$servicio);
								$data['token'] = $token;
								$this->load->view('mview_NoSatisfaccion',$data);
								$this->Mdl_Consultas->EliminarToken('t_dat_token',$data['folio']);
							}
						}
					}
			}else{
					$idServicio = $this->session->flashdata('idServicio');
					$registro = $this->Mdl_Consultas->ServicioFolio($idServicio);
					foreach ($registro as $valor) {
						$folio = $valor->id_servicio;
					}
					$duplicar = $this->Mdl_Consultas->Duplicar('t_dat_servicios',$folio);
					if ($duplicar==true) {
						$datos['id_servicio_anterior'] = 0;
						$this->Mdl_Consultas->ActualizarServicio($datos,$folio);
						$data['Detalle_reabierto'] = $this->input->post('detalle');
						$data['Fecha_cita_programada'] = $this->input->post('fecha');
						$data['Codigo_activacion'] = NumeroAleatorio();
						$data['Codigo_terminacion'] = NumeroAleatorio();
						$data['id_servicio_anterior'] = $folio;
						$IdregistroActualizado = $this->Mdl_Consultas->LastRow();
						$registroActualizado = $this->Mdl_Consultas->ActualizarServicio($data,$IdregistroActualizado);
						if ($registroActualizado) {
							echo $IdregistroActualizado;
							$reabierto = $this->Mdl_Consultas->ServicioFolio($IdregistroActualizado);
							foreach ($reabierto as $valor) {
								$para = $valor->Correo_solicitante;
								$asunto = "Datos sobre el servicio(Reabierto) - Adsumus";
								$body = "<html><head><title>Servicio asignado</title><style>
									body{
										margin: 0;
									}
									div.navegador{
										width: 100%;
										height: 50px;
										position: fixed;
										top: 0;
										background-color: #2B2B28;
										padding: 10px;
										position: relative;
									}
									div.logo{
										background-image: url(http://repair.adsumus.com.mx/img/adsumus-logo.png);
										height: 55px;
										width: 150px;
										margin-right: 30px;
										background-size: contain;
										background-position: center;
										background-repeat: no-repeat;
									}
									div.contenedor{
										position: absolute;
										margin-top: 10px;
									}
									</style></head><body><div class='navegador'>
										<div class='logo'>

										</div>
									</div>".
												"<div class='contenedor'><p>Nuevo Folio del servicio: ".$valor->id_servicio."<br><br>Código de Activación: ".$valor->Codigo_activacion."<br><br>Código de Terminación: ".$valor->Codigo_terminacion."<br><br>Ingeniero asignado: ".$valor->Ejecutivo_asignado."</p></div>".
												"</body></html>";
								$this->email->set_mailtype('html');
								$this->email->from('noreply@repair.adsumus.com.mx','Adsumus');
								$this->email->to($para);
								$this->email->subject($asunto);
								$this->email->message($body);

							if($this->email->send()){
								echo "<script>alert('sen envio correo');</script>";
								print_r($valor->Correo_solicitante);
							}else{
								echo $this->email->print_debugger();
							}
						}
					}else{
						echo 'No existe registro con ese folio';
					}
				}
			}
		}

		public function Chart($eval){
			$data['servicios'] = $this->Mdl_Consultas->TiposCatalogos('Tipo_servicio');
			$data['ejecutivos'] = $this->Mdl_Consultas->Ejecutivos();
			$data['empresas'] = $this->Mdl_Consultas->ValoresDistintos('t_dat_servicios','Razon_social_cliente');
			$this->load->view('sview_HeaderEstadisticas');
			$this->load->view('mview_Eval'.$eval,$data);
			$this->load->view('sview_Footer');
		}

		public function ChartServicio($tipo){
			if ($tipo == 'An%C3%A1lisis%20de%20campo') {
				$tipo = 'Análisis de campo';
			}elseif ($tipo == 'Reparaci%C3%B3n') {
				$tipo = 'Reparación';
			}
			$data['preguntas'] = $this->Mdl_Consultas->TiposCatalogos('Evaluacion');
			$data['evaluacion'] = $this->Mdl_Consultas->EvaluacionServicio($tipo,'Tipo_servicio');
			$data['tipo'] = $tipo;
			if ($data['evaluacion'] != false) {
				$this->load->view('sview_HeaderEstadisticas');
				$this->load->view('sview_GraficaServicios',$data);
				$this->load->view('sview_Footer');
			}else{
				echo 'alert("Este tipo de servicio aun no cuenta con servicios evaluados");';
				echo 'window.location.href ='.base_url().'Evaluacion/Servicio;';
			}
		}

		public function ChartEjecutivo($id){
			$data['evaluacion'] = $this->Mdl_Consultas->EvaluacionServicio($id,'id_usuario');
			$validarServicios = $this->Mdl_Consultas->EvaluacionEjecutivo($id,'id_usuario','f_id_servicio');
			if ($validarServicios != false) {
				$data['serviciosEval'] = json_encode($validarServicios);
			}else{
				$data['serviciosEval'] = false;
			}
			$data['ejecutivo'] = $this->Mdl_Consultas->DatosRow('t_dat_usuarios','id_usuario',$id);
			// Obtenemos las preguntas
			$data['preguntas'] = $this->Mdl_Consultas->TiposCatalogos('Evaluacion');
			if ($data['evaluacion'] != false) {
				$this->load->view('sview_HeaderEstadisticas');
				$this->load->view('sview_GraficaEjecutivos',$data);
				$this->load->view('sview_Footer');
			}else{
				echo 'alert("Este ejecutivo aun no cuenta con servicios evaluados");';
				echo 'window.location.href ='.base_url().'Evaluacion/Ejecutivo;';
			}
		}

		public function ChartEmpresa($empresa){
			//Obtenemos el promedio de evaluacion de la empresas
			$data['promedio'] = $this->Mdl_Consultas->EvaluacionServicio($empresa,'Razon_social_cliente');
			// Obtenemos la evaluacion de los ultimos 10 servicios y validamos que esta empresa tenga al menos un servicio evaluado
			$validarServicios = $this->Mdl_Consultas->EvaluacionEjecutivo($empresa,'Razon_social_cliente','Razon_social_cliente');
			if ($validarServicios != false) {
				$data['servicios'] = json_encode($validarServicios);
			}else{
				$data['servicios'] = false;
			}
			$data['empresa'] = $empresa;
			// Obtenemos las preguntas
			$data['preguntas'] = $this->Mdl_Consultas->TiposCatalogos('Evaluacion');
			if ($data['promedio'] != false) {
				$this->load->view('sview_HeaderEstadisticas');
				$this->load->view('sview_GraficaEmpresas',$data);
				$this->load->view('sview_Footer');
			}
		}

	//Inicio de funciones del data table modulo usuarios
		public function ajax_list(){
		 $list = $this->Mdl_funciones->get_datatables();
		 $data = array();
		 $no = $_POST['start'];
		 foreach ($list as $usuario){
				 $no++;
				 $row = array();
				 $row[] = $usuario->Usuario;
				 $row[] = $usuario->Perfil;
				 $row[] = $usuario->Estatus;
				 $row[] = '<a class="btn btn-warning btn-sm btn-block" title="Editar al Usuario '. $usuario->Usuario.'" data-target="#modal_form" onclick="editarUsuarios('."'".$usuario->id_usuario."'".')"> Editar</a>';
				 $data[] = $row;
		 }
		 $output = array(
										 "draw" => $_POST['draw'],
										 "recordsTotal" => $this->Mdl_funciones->count_all(),
										 "recordsFiltered" => $this->Mdl_funciones->count_filtered(),
										 "data" => $data
						 );
		 echo json_encode($output);
 		}

		public function ajax_edit($id){
		     $data = $this->Mdl_funciones->get_by_id($id);
		     echo json_encode($data);
		}

		public function ajax_update(){
		    $data = array(
		            'Usuario' => $this->input->post('Usuario'),
		            'Correo' => $this->input->post('Correo'),
		            'Perfil' => $this->input->post('Perfil'),
		            'Contraseña' => $this->input->post('Password1'),
		            'Contraseña' => $this->input->post('Password2'),
		            'Estatus' => $this->input->post('Estatus')
		        );
		    $this->Mdl_funciones->update(array('id_usuario' => $this->input->post('id_usuario')), $data);
		    echo json_encode(array("status" => TRUE));
		}
	//Fin de funciones del data table modulo usuarios

	//Inicio de Funciones de Listado del Servicios
	public function ListadoServicios(){
			$datos['ejecutivos'] = $this->Mdl_Consultas->Ejecutivos();
			$datos['Tipos'] = $this->Mdl_funciones->Tipos();
			$datos['mostrar'] = $this->Mdl_funciones->Mostrar('t_dat_servicios');
			$datos['tablas'] = $this->Mdl_funciones->o_tabla();
			$this->load->view('sview_Header');
			$this->load->view('sview_ListadoServicios',$datos);
			$this->load->view('sview_Footer');
	}
	//Fin de Funciones de Listado del Servicios

	//Inicio de Funciones de Informacion del Servicios
	 public function InformacionServicio($id){
			$this->form_validation->set_rules('nombre_solicitante','Nombre del Solicitante', 'required');
			$this->form_validation->set_rules('ejecutivo_asignado','Ejecutivo', 'required');
			$this->form_validation->set_rules('correo_solicitante','Correo', 'required');
			if ($this->form_validation->run()==false) {
				$data['tipo_servicio'] = $this->Mdl_Consultas->Select('t_cat_catalogos','Tipo_servicio');
			  $data['ejecutivos'] = $this->Mdl_Consultas->Ejecutivos();
				$data['servicios']=$this->Mdl_Consultas->ServicioFolio($id);
				$this->load->view('sview_Header');
				$this->load->view('mview_InformacionServicio',$data);
				$this->load->view('sview_Footer');
			}else {
				$data['f_id_usuario'] = $this->input->post('ejecutivo_asignado');
				$data['Ejecutivo_asignado'] = $this->Mdl_Consultas->NombreUsuario($data['f_id_usuario']);
				$data['Razon_social_cliente'] = $this->input->post('razon');
				$data['Nombre_solicitante'] = $this->input->post('nombre_solicitante');
				$data['Correo_solicitante'] = $this->input->post('correo_solicitante');
				$data['Direccion_cliente'] = $this->input->post('direccion_cliente');
				$data['Ubicacion_servicio'] = $this->input->post('ubicacion_servicio');
				$data['Telefono_solicitante'] = $this->input->post('telefono_solicitante');
				if($this->input->post('tipo_servicio') != null){
						$data['Tipo_servicio'] = $this->Mdl_Consultas->DescripcionSelect('Tipo_servicio',$this->input->post('tipo_servicio'));
				}
				$data['Descripcion_servicio'] = $this->input->post('descripcion_servicio');
				$data['Fecha_cita_programada'] = $this->input->post('fecha_cita_programada');

				$insertar = $this->Mdl_Consultas->ActualizarServicio($data,$id);
				if ($insertar==false) {
					echo "<script>alert('Ocurrio un Error');</script>";
				}else {
				echo	"<script>alert('Se Actualizo Correctamente');window.location='".base_url()."Inicio';</script>";
				}
			}
		}
	//Fin de Funciones de Informacion del Servicios

}
?>
