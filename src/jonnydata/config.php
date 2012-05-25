<?php
/**
 * Projeto Jonny Data - Conheça seu vereador
 * @package jonnydata
 */
namespace jonnydata;

//configuração do include_path
ini_set('include_path', implode(PATH_SEPARATOR, array_unique(
	array_merge(
		array(realpath(dirname(__FILE__).'/../..')),
		explode(PATH_SEPARATOR, ini_get('include_path'))
	)
)));

//registra a função autoload
spl_autoload_register(function($class) {
	$classPath = implode(DIRECTORY_SEPARATOR,explode('\\',$class)).'.php';
	
	require $classPath;
},true);