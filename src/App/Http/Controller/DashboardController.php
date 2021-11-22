<?php

namespace App\Http\Controller;

class DashboardController extends Controller
{
  public function __construct()
  {
    $this->user = $this->model('users');
    
    if (empty($this->user->session()->get('id'))) {
      return $this->redirectTo('admin');
    }
  }

  public function index()
  {
    $data = $this->user->findBy('id', $this->user->session->get('id'));

    return view("admin/dashboard", [
      "title"   => "Dashboard",
      "data"    => $data[0]
    ]);
  }
}