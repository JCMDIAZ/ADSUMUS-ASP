<?php

class ValidarSesion{
	public function __construct()
	{
		$this->ci =& get_instance();
	}

	public function ValidarLogin(){
		if($this->ci->uri->segment(1) == 'Login' && $this->ci->session->userdata('correo') == true){
			redirect(base_url('Inicio'));
		}else if($this->ci->session->userdata('correo') == false && $this->ci->uri->segment(1) != 'Login'){
			redirect(base_url('Login'));
		}
	}

	public function TipoUsuario(){
		$perfil = $this->ci->session->userdata('perfil');

		switch ($perfil) {
			case 'Ejecutivo':
				if ($this->ci->uri->segment(1) == 'Levantamiento_servicio' OR $this->ci->uri->segment(1) == 'Evaluacion'){
					echo "<script>alert('No tienes permiso para acceder a esta pagina!');
					window.location.href = '".base_url()."Inicio';</script>";
				}
				break;
			case 'Administrador':
			if ($this->ci->uri->segment(1) == 'Atencion_servicio'){
				echo "<script>alert('No tienes permiso para acceder a esta pagina!');
				window.location.href = '".base_url()."Inicio';</script>";
			}
				break;
			default:
				# code...
				break;
		}
	}
}
