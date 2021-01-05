<?php
namespace App\Http\Controller;

class AdminController extends Controller
{
  public function __construct($prop)
  {
    parent::__construct($prop);
  }
  
  public function index()
  {
    $this->view('admin/index');
  }
}