<?php
error_reporting(E_ALL & ~E_NOTICE);
date_default_timezone_set('America/New_York');
session_start();
$base_dir = __DIR__.'/';
require_once "vendor/autoload.php";
require_once $base_dir . 'config.php';
require_once $base_dir . 'lib/functions.php';
require_once $base_dir . 'lib/App.php';
require_once $base_dir . 'lib/DB.php';
require_once $base_dir . 'lib/Validate.php';
$app = new Application();
$app->set('colors', $colors);
$app->config('title_separator', " | ");
$app->config('title', "App Title");
$app->header_nav('Home', '/prototypes/index.php');
if($_SERVER['SCRIPT_NAME'] != '/prototypes/index.php'){
    $app->crumb("Home", '/prototypes/index.php');
}
?>
