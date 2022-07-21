<?php

namespace App\Http\Controller\Auth;

use App\Http\Controller\Controller;

class RegisterController extends Controller
{
  public function index()
  {
    return view('admin/register', [
      'title' => 'Register | Wadahkode'
    ]);
  }
}