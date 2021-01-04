<?php

$this->get('/', function(){
  // call WelcomeController
  $welcome = $this->require('App/Http/Controller/WelcomeController');

  // cetak Hello world di browser
  $welcome->index();
});