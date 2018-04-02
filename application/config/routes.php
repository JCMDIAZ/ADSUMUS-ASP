<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Ctr_Principal';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['ModuloU']= 'Ctr_Principal/ModuloU';
$route['Nuevo']= 'Ctr_Principal/ModuloU';

$route['Login']= 'Ctr_Login/Login';
$route['Logout'] = 'Ctr_Login/Logout';

$route['Inicio']= 'Ctr_Principal/ModuloU';
$route['Levantamiento_servicio']= 'Ctr_Principal/Levantamiento';
