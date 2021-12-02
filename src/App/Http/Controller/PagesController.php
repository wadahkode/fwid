<?php

namespace App\Http\Controller;

class PagesController extends Controller
{
  public function index()
  {
    $pages = $this->model('pages');

    $result = $pages->findAll();

    echo(json_encode($result));
  }
}