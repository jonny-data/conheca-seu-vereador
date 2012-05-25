<?php
/**
 * Projeto Jonny Data - Conheça seu vereador
 * @package jonnydata
 */
namespace jonnydata;

//configuração do ambiente. TRUE para produção, FALSE para desenvolvimento.
$production = false;

ini_set('display_errors', $production?'Off':'On');
error_reporting($production?E_ALL & ~E_DEPRECATED & ~E_STRICT:E_ALL|E_STRICT);

//configuração do include_path
ini_set('include_path', implode(PATH_SEPARATOR, array_unique(
	array_merge(
		array(realpath(dirname(__FILE__) . '/..')),
		explode(PATH_SEPARATOR, ini_get('include_path'))
	)
)));

//registra a função autoload
spl_autoload_register(function($class) {
	$classPath = stream_resolve_include_path(
		implode(DIRECTORY_SEPARATOR,explode('\\', $class)).'.php'
	);
	
	if (file_exists($classPath)) {
		require $classPath;
	}
},true);