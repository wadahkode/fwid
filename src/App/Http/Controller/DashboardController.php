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

    if (!empty($this->idLogged)) {
      $this->data = $this->user->findBy('id', $this->idLogged);
    } else if (!empty($request->user)) {
      $this->data = $this->user->findBy('id', $request->user);
    }
  }

  public function getPost()
  {
    $tutorials = $this->model('posts')->findAll();

    return view("admin/posts/index", [
      "title"   => "Semua postingan",
      "data"    => $this->data[0],
      "tutorials" => $tutorials
    ]);
  }

  public function index()
  {
    // if (!empty($this->idLogged)) {
    //   $this->data = $this->user->findBy('id', $this->idLogged);
    // } else if (!empty($request->user)) {
    //   $this->data = $this->user->findBy('id', $request->user);
    // }

    return view("admin/dashboard", [
      "title"   => "Dashboard",
      "data"    => $this->data[0]
    ]);
  }

  public function createNewPost()
  {
    return view("admin/posts/create", [
      "title"   => "Create new post",
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