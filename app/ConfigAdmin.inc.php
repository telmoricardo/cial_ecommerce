<?php 
session_start();
ob_start();

// DEFINE A BASE DO SITE ####################
define('HOME', 'http://localhost/works/cial/admin');
define('THEME', 'admin');
define('INCLUDE_PATH', HOME . '/themes/' . THEME);
define('REQUIRE_PATH', 'themes/' . THEME);

// DEFINE URL SITE ####################
$getUrl = strip_tags(trim(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)));
$setUrl = (empty($getUrl) ? 'index' : $getUrl);
$Url = explode('/', $setUrl);

require_once 'autoload.php';



