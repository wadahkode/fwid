<?php

$this->get('/', function(){
  // panggil kontroller welcome
  $welcome = $this->require('App/Http/Controller/WelcomeController');
  // cetak dibrowser
  return $welcome->index();
});