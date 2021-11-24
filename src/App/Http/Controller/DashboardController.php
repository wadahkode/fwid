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

  public function postingan()
  {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $test = json_encode([
      ["title" => "title 1"],
      ["title" => "title 2"]
    ]);

    echo($test);
  }
}