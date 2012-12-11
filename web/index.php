<?php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/{short_path}', function ($short_path){
  return $short_path;
});

$app->run();
