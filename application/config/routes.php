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
$route['Evaluacion/(:any)']= 'Ctr_Principal/Chart/$1';
$route['Evaluacion/Servicio/(:any)'] = 'Ctr_Principal/ChartServicio/$1';
$route['Evaluacion/Ejecutivo/(:num)'] = 'Ctr_Principal/ChartEjecutivo/$1';
$route['Evaluacion/Empresa/(:any)'] = 'Ctr_Principal/ChartEmpresa/$1';
$route['Terminado']= 'Ctr_Principal/TerminarServicio';

$route['Encuesta/(:any)']= 'Ctr_Principal/Encuesta/$1';
$route['Encuesta/Evaluacion_servicio/1']= 'Ctr_Principal/Evaluacion_servicio';
$route['Encuesta/No_satisfaccion_servicio/2']= 'Ctr_Principal/No_satisfaccion';

$route['Informacion/(:num)']= 'Ctr_Principal/InformacionServicio/$1';
