<?php

namespace App\Http\Controller;

class TutorialController extends Controller
{
  protected $data = [];

  public function __construct()
  {
    $this->data = $this->model('tutorials')->findAll();
  }

  public function index()
  {
    return view('tutorial', [
      "title"     => "Baca artikel",
      "posts"     => $this->data
    ]);
  }
}