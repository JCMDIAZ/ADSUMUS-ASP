<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Ctr_Principal';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['ModuloU']= 'Ctr_Principal/ModuloU';
$route['Nuevo']= 'Ctr_Principal/ModuloU';

$route['Login']= 'Ctr_Login/Login';
$route['Logout'] = 'Ctr_Login/Logout';

$route['Inicio']= 'Ctr_Principal/ListadoServicios';
$route['Levantamiento_servicio']= 'Ctr_Principal/Levantamiento';
$route['Atencion_servicio']= 'Ctr_Principal/AtencionServicio';
$route['ActualizarServicio/(:num)']= 'Ctr_Principal/ActualizarServicio/$1';


$route['Listado_Servicios']= 'Ctr_Principal/ListadoServicios';
$route['grafica/(:num)']= 'Ctr_Principal/Chart/$1';
$route['Terminado']= 'Ctr_Principal/TerminarServicio';
$route['Evaluacion_servicio/(:any)']= 'Ctr_Principal/Evaluacion_servicio/$1';

$route['No_satisfaccion_servicio/(:any)']= 'Ctr_Principal/No_satisfaccion/$1';


$route['Informacion/(:num)']= 'Ctr_Principal/InformacionServicio/$1';
