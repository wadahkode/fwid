<?php

namespace App\Http\Controller;

class WelcomeController extends Controller
{
  public function __construct()
  {
    $this->pages = $this->model('pages')->findAll();
  }

  public function index()
  {
    return view("welcome", [
      "title" => "Welcome to wadahkode",
      "pages" => $this->pages
    ]);
  }
}