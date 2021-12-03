<?php

namespace App\Http\Controller;

class WelcomeController extends Controller
{
  public function index()
  {
    return view("welcome", [
      "title" => "Welcome to wadahkode"
    ]);
  }
}