<?php

namespace App\Http\Controller;

class VisitorController extends Controller
{
  public function index()
  {
    echo file_get_contents(APP_STORE_DIR . 'visitor.json');
  }
}