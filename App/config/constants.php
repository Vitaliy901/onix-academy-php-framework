<?php 
define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('ROOT', dirname(__DIR__, 2));
define('ROOT_APP', dirname(__DIR__, 1));

const DS = DIRECTORY_SEPARATOR;
const DATA_BASE = ROOT . DS . 'database';
const FILE_FORMAT = '.json';
const LAYOUTS_PATH = SERVER_ROOT . DS . 'layouts';
const VIEWS_PATH = SERVER_ROOT . DS . 'views';
const SESSNAME = 'runo_sess';

/*
	1 - developmet;
	0 - production;
*/
const DEBUG = 1;
const DEBUG_FILE = ROOT . DS .'App' . DS . 'temp' . DS . 'errors.log';
?>