<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Validamos que este en uso una sesion
$hook['post_controller_constructor'][] = array(
                                'class'    => 'ValidarSesion',
                                'function' => 'ValidarLogin',
                                'filename' => 'ValidarSesion.php',
                                'filepath' => 'hooks'
                                );
$hook['post_controller_constructor'][] = array(
                                'class'    => 'ValidarSesion',
                                'function' => 'TipoUsuario',
                                'filename' => 'ValidarSesion.php',
                                'filepath' => 'hooks'
                                );
