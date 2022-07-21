<?php

namespace App\Http\Controller;

class ContactController extends Controller
{
  public function index()
  {
    return view('contact', [
      'title' => 'Contact'
    ]);
  }
}