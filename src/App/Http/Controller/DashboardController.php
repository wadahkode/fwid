<?php

namespace App\Http\Controller;

use Wadahkode\Http\Request;

class DashboardController extends Controller
{
  protected $data = [];
  protected $idLogged = null;

  public function __construct(Request $request)
  {
    $this->user     = $this->model('users');
    $this->session  = $this->user->session();
    $this->idLogged = $this->session->get('id');
    
    if (empty($this->idLogged) && empty($request->user)) {
      return $this->redirectTo('admin');
    }
  }

  public function index(Request $request)
  {
    if (!empty($this->idLogged)) {
      $this->data = $this->user->findBy('id', $this->idLogged);
    } else if (!empty($request->user)) {
      $this->data = $this->user->findBy('id', $request->user);
    }

    return view("admin/dashboard", [
      "title"   => "Dashboard",
      "data"    => $this->data[0]
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