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
	}

	public function Index(){
		$this->load->view('sview_Header');
		$this->load->view('sview_ModuloU');
		$this->load->view('sview_Footer');
	}

	//Modulo Usuarios
	public function ModuloU(){
		$this->form_validation->set_rules('nombre','Nombre','required');
		$this->form_validation->set_rules('contraseñaU','Contraseña','required');
		$this->form_validation->set_rules('contraseñaC','Contraseña','required');
		$this->form_validation->set_rules('perfil_usuario','Perfil de Usuario','required');

		$datos['Tipos'] = $this->Mdl_funciones->Tipos();
		$this->load->view('sview_Header');
		$this->load->view('sview_ModuloU',$datos);
		$this->load->view('sview_Footer');
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
            $data['Fecha_elaboracion'] = "CURDATE()";
            $data['Nombre_solicitante'] = $this->input->post('nombre_solicitante');
            $data['Correo_solicitante'] = $this->input->post('correo_solicitante');
            $data['Direccion_cliente'] = $this->input->post('direccion_cliente');
            $data['Ubicacion_servicio'] = $this->input->post('ubicacion_servicio');
            $data['Telefono_solicitante'] = $this->input->post('telefono_solicitante');
            $data['Tipo_servicio'] = $this->Mdl_Consultas->DescripcionSelect('Tipo_servicio',$this->input->post('tipo_servicio'));
            $data['Descripcion_servicio'] = $this->input->post('descripcion_servicio');
            $data['Fecha_cita_programada'] = $this->input->post('fecha_cita_programada');
            $data['Codigo_activacion'] = NumeroAleatorio();
            $data['Codigo_terminacion'] = NumeroAleatorio();
            $insertar = $this->Mdl_Consultas->InsertarDatos('t_dat_servicios',$data);
            if($insertar == true){
                echo '<script> aux = confirm("Se levanto correctamente el servicio \n Desea agregar uno nuevo?");
                if(aux== true){
                    window.location.href = "'.base_url().'Levantamiento_servicio";
                }else{
                    window.location.href = "'.base_url().'Inicio";
                }
                </script>';
                mail($data['Correo_solicitante'],"Datos sobre el servicio - Adsumus","Código de Activación: ".$data['Codigo_activacion']."\n Código de Terminacion: ".$data['Codigo_terminacion']."\n Ejecutivo asignado: ".$data['Ejecutivo_asignado']);
            }else{
                echo '<script>alert("Ocurrio un error al levantar el servicio");</script>';
            }
        }
     
        
    }
}
?>
