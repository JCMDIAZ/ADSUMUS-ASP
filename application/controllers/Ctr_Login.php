<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->helper('form');
		$this->load->library('form_validation');
        $this->load->model('Mdl_Consultas');
	}

	public function Index(){
		$this->load->view('sview_Header');
		$this->load->view('sview_Footer');
	}

	//Modulo Login
	public function Login(){
        $this->form_validation->set_rules("usuario", 'Usuario', "required");
        $this->form_validation->set_rules('contraseña', 'contraseña', 'required');
        
        if($this->form_validation->run() == false){
            $this->load->view('mview_Login');
        }else{
            $data['usuario'] = $this->input->post('usuario');
            $data['contraseña']= $this->input->post('contraseña');
            
            $validarUsuario = $this->Mdl_Consultas->Login($data);
            
            if($validarUsuario){
                foreach($validarUsuario as $validarUsuario){
                    $data['usuario'] = $validarUsuario->Usuario;
                    $data['contraseña']= $validarUsuario->Contrasena;
                    $data['perfil']= $validarUsuario->Perfil;
                }
                header('Cache-Control: no cache'); //no cache
				session_cache_limiter('private_no_expire'); // works
                $this->session->set_userdata($data);
                echo "<script>window.location.href = '".base_url()."Inicio';</script>";
            }else{
                echo '<script>alert("Usuario y/o contraseña incorrectos");</script>';
                echo "<script>window.location.href = '".base_url()."Login';</script>";
            }
        }
	}
    
    public function Logout(){
        $this->session->sess_destroy();
		redirect(base_url().'Login');
    }
}
?>
