<?php
namespace App\Http\Controller;

class AdminController extends Controller
{
  public function index()
  {
    return view('admin/index');
  }
}