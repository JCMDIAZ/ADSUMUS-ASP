<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_Principal extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Mdl_funciones');
		$this->load->model('Mdl_Consultas');
		$this->load->database();
    $this->load->library('email');
	}

	public function Index(){
		$datos['Tipos'] = $this->Mdl_funciones->Tipos();
		$this->load->view('sview_Header');
		$this->load->view('sview_ModuloU',$datos);
		$this->load->view('sview_Footer');
	}

	//Modulo Usuarios
	public function ModuloU(){
		$datos['Tipos'] = $this->Mdl_funciones->Tipos();
		$this->load->view('sview_Header');
		$this->load->view('sview_ModuloU',$datos);
		$this->load->view('sview_Footer');
	}

		public function add(){
		$this->form_validation->set_rules('Correo1', 'Correo', 'required|valid_email|is_unique[t_dat_usuarios.Correo]');
		if ($this->form_validation->run() == true) {
		$this->load->model('Mdl_funciones');
		$this->Mdl_funciones->insertPrueba();
	}
		else {
		echo "<script>alert('¡Correo Existente!');window.location.href='javascript:history.back(-1);'</script>";
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
            $data['Codigo_activacion'] = NumeroAleatorio();
            $data['Codigo_terminacion'] = NumeroAleatorio();
            $insertar = $this->Mdl_Consultas->InsertarDatos('t_dat_servicios',$data);
            if($insertar == true){
                /*$headers =  'MIME-Version: 1.0' . "\r\n";
                $headers .= 'From: Aldo Martinez <aldo.mireles.97@gmail.com>' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";*/

                $para = $data['Correo_solicitante'];
                $asunto = "Datos sobre el servicio - Adsumus";
                $body = "Código de Activación: ".$data['Codigo_activacion']."\n Código de Terminacion: ".$data['Codigo_terminacion']."\n Ejecutivo asignado: ".$data['Ejecutivo_asignado'];

                //mail($para,$asunto,$body,$headers);

                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                $this->email->from('aldo@vision.com','Aldo Martinez');
                $this->email->to($para);
                $this->email->subject($asunto);
                $this->email->message($body);

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


            }else{
                echo '<script>alert("Ocurrio un error al levantar el servicio");</script>';
            }
        }
    }


     public function AtencionServicio(){
        $this->form_validation->set_rules('activacion', 'Activacion', 'required');
         if($this->form_validation->run() == false){
             redirect('Inicio');
         }else{
             $activacion = $this->input->post('activacion');
						 // valida que exista un servicio con el codigo de activacion proporcionado
             $servicioValido = $this->Mdl_Consultas->Servicio($activacion);

						 if($servicioValido != false){
							 foreach ($servicioValido as $value) {
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
										$data['servicio'] = $this->Mdl_Consultas->InicioServicio($activacion);
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
         }else{
					 echo '<script>alert("No existe un servicio con el código de acivación proporcionado")</script>';
					 echo '<script>window.location.href = "'.base_url().'Inicio";</script>';
				 }
    	}
	}

		public function ActualizarServicio($folio){
			$data['Observaciones'] = $this->input->post('observaciones');
			$data['Material_utilizado'] = $this->input->post('material_utilizado');

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
		}


//PRUEBA DATATABLE
		public function ajax_list(){
		 $list = $this->Mdl_funciones->get_datatables();
		 $data = array();
		 $no = $_POST['start'];
		 foreach ($list as $usuario) {
				 $no++;
				 $row = array();
				 $row[] = $usuario->Usuario;
				 $row[] = $usuario->Perfil;
				 $row[] = $usuario->Estatus;
				 //add html for action
				 $row[] = '<a class="btn btn-sm btn-warning"  title="Edit" data-target="#modal_form" onclick="editarUsuarios('."'".$usuario->id_usuario."'".')"> Editar</a>';
				 $data[] = $row;
		 }
		 $output = array(
										 "draw" => $_POST['draw'],
										 "recordsTotal" => $this->Mdl_funciones->count_all(),
										 "recordsFiltered" => $this->Mdl_funciones->count_filtered(),
										 "data" => $data
						 );
		 //output to json format
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
              'Contraseña' => $this->input->post('Contraseña'),
              'Contraseña' => $this->input->post('Contraseña'),
              'Estatus' => $this->input->post('Estatus')
          );
      $this->Mdl_funciones->update(array('id_usuario' => $this->input->post('id_usuario')), $data);
      echo json_encode(array("status" => TRUE));
  }

	//Inicio de Funciones de Listado del Servicios
		public function ListadoServicios(){
			$datos['ejecutivos'] = $this->Mdl_Consultas->Ejecutivos();
			$datos['Tipos'] = $this->Mdl_funciones->Tipos();
			$this->load->view('sview_Header');
			$this->load->view('sview_ListadoServicios',$datos);
			$this->load->view('sview_Footer');
		}




	}
?>
