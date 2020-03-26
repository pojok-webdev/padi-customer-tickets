<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	$autoload['packages'] = array(APPPATH.'third_party');
	$autoload['libraries'] = array(
		'database',
		'pagination',
		'session',
		'common',
		'auth',
		'authentication',
		'email',
		'template',
		'form_validation',
	);
	$autoload['helper'] = array('array','url','form','date','file','directory','text','cookie');
	$autoload['config'] = array();
	$autoload['language'] = array();
	$autoload['model'] = array(
		'ticket'
	);
