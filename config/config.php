<?php
//DEFINIR TIMEZONE PADRÃO
date_default_timezone_set("Brazil/East");

//OCULTAR OS WARNING DO PHP
//error_reporting(E_ALL ^ E_WARNING);
//ini_set("display_errors", 0 );
// DEFININDO OS DADOS DE ACESSO AO BANCO DE DADOS
define("DB", 'mysql');
define("DB_HOST", "localhost");
define("DB_NAME", "reuniao");
define("DB_USER", "root");
define("DB_PASS", "root");


/*
//Producao
// define("DB_PASS","S41@s1stem4s");
//Desenvolvimento 
// CONFIGURACOES PADRAO DO SISTEMA
define("PORTAL_URL", 'http://localhost/siplage/');
define("TITULOSISTEMA", 'SIPLAGE');
define("FAVICONSISTEMA", 'http://localhost/siplage/upload/favicon.png');
define("LOGO_DASHBOARD", 'http://localhost/siplage/tema/img/logo-gestor-de-cargos.svg');
define("CSS_FOLDER", 'http://localhost/siplage/assets/css/');
define("IMG_FOLDER", 'http://localhost/siplage/assets/img/');
define("JS_FOLDER", 'http://localhost/siplage/assets/js/');
define("FONTS_FOLDER", 'http://localhost/siplage/assets/fontes/');
define("PLUGINS_FOLDER", 'http://localhost/siplage/assets/plugins/');
define("UTILS_FOLER", 'http://localhost/siplage/utils/');
define("ASSETS_FOLDER", 'http://localhost/siplage/assets/');
define("PORTAL_URL_SERVIDOR", 'C:/xampp/htdocs/siplage/');

//CONFIGURACAO DE ENVIO DE E-MAIL
define('EMAIL_NOME', 'DDSIS');
define('EMAIL_ENDERECO', 'sistamas.sai@ac.gov.br');
define('URL_ENDERECO', 'http://sai.ac.gov.br');
define('EMAIL_TITULO', 'Notificação - DDSIS');
define('EMAIL_DESENVOLVIMENTO', nl2br('Secretaria de Estado de Articulação Institucional - SAI/DESENVOLVIMENTO DE SISTEMAS'));

// ADICIONAR CLASSE DE CONEÇÃO
include_once("Conexao.class.php");
*/
?>