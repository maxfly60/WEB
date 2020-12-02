<?php
session_start();
require "../../includes/flight/flight/Flight.php";
require '../../includes/smarty/libs/Smarty.class.php'; 
require '../../includes/pdo.php';

$db = new PDO(
    "mysql:host=$serv;dbname=$BDD;port=$port;charset=utf8",$user,$mdp
);

Flight::set('db', $db);

Flight::register('view', 'Smarty', array(), function($smarty){
    $smarty->template_dir = './templates/';
    $smarty->compile_dir = './templates_c/';
    $smarty->config_dir = './config/';
    $smarty->cache_dir = './cache/';
   });
    Flight::map('render', function($template, $data){
    Flight::view()->assign($data);
    Flight::view()->display($template);
   }); 

Flight::route('/', function(){
    echo 'hello world!';
});

include("fonctions.php");
Flight::start();
?>