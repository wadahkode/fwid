<?php
namespace App\Http\Controller;

class WelcomeController extends Controller
{
  public function __construct($prop)
  {
    parent::__construct($prop);
  }
  
  public function index()
  {
    $this->view('welcome');
  }
}