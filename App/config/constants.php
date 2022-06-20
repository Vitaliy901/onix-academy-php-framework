<?php 
define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT']);
const DS = DIRECTORY_SEPARATOR;
const DATA_BASE = '../../database';
const FILE_FORMAT = '.json';
const LAYOUTS_PATH = SERVER_ROOT . DS . 'layouts';
const VIEWS_PATH = SERVER_ROOT . DS . 'views';
const SESSNAME = 'runo_sess';

/*
	1 - developmet;
	0 - production;
*/
const DEBUG = 0;
const DEBUG_FILE = '../../errors.log';
?>