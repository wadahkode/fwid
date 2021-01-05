<?php

$this->get('/', function($route){
  // call WelcomeController
  $welcome = $route->require('App/Http/Controller/WelcomeController');

  // cetak Hello world di browser
  $welcome->index();
});

$this->get('/admin', function($route){
  $route->require('App/Http/Controller/AdminController', 'index');
});