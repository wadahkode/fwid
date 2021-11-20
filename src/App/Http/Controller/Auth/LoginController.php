<?php

namespace App\Http\Controller\Auth;

use App\Http\Controller\Controller;

class LoginController extends Controller
{
  public function index()
  {
    return view('admin/login', [
      'title' => 'Login | Wadahkode'
    ]);
  }
}