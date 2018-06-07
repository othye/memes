<?php

  require_once './vendor/autoload.php';
  require './controlers/controller.php';
  require './config/pdo.php';

  $loader = new Twig_Loader_Filesystem('./views');

  $twig = new Twig_Environment($loader, [
    'cache' => false
  ]);

  $twig->addFunction(new \Twig_SimpleFunction('baseUrl', function ($url) {

  $rootUrl = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);

    return $rootUrl.$url;

  }));

  $pdo = new Database();

  
switch (true) {
  case !empty($_POST):
    return ctrlGenerate($twig, $pdo, $_POST);
  break;

  case !empty($_GET['create']):
    return ctrlCreate($twig, $pdo);
  break;

  default:
    return ctrlListing($twig, $pdo);
  break;

}

?>
  