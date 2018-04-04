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
		$this->load->model('Mdl_funciones');
		$this->Mdl_funciones->insertPrueba();
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
             $data['servicio'] = $this->Mdl_Consultas->InicioServicio($activacion);
             if($data['servicio'] != false){
                 $data['tipo_servicio'] = $this->Mdl_Consultas->Select('t_cat_catalogos','Tipo_servicio');
                $data['ejecutivos'] = $this->Mdl_Consultas->Ejecutivos();
                $data['estatus'] = $this->Mdl_Consultas->Select('t_cat_catalogos','Estatus_servicio');
                $this->load->view('sview_Header');
                $this->load->view('mview_AtencionServicio',$data);
                $this->load->view('sview_Footer');
             }else{
                 echo '<script>alert("Ocurrio un error al validar el código de activación")</script>';
             }
         }
    }
}
   
?>
