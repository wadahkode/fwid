<?php

$this->get('/', function(){
  // call WelcomeController
  return $this->require('App/Http/Controller/WelcomeController', 'index');
});