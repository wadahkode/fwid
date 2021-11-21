<?php

namespace App\Http\Controller;

class AboutController extends Controller
{
  public function index()
  {
    return view('about', [
      'title' => 'About'
    ]);
  }
}