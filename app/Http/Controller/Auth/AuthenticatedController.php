<?php

namespace App\Http\Controller\Auth;

use App\Http\Controller\Controller;
use Wadahkode\Http\Request;

class AuthenticatedController extends Controller
{
  public function __construct()
  {
    $this->user = $this->model('users');
  }
  
  public function index(Request $request)
  {
    $email = $request->get('email', FILTER_SANITIZE_STRIPPED);
    $password = $request->get('password', FILTER_SANITIZE_STRIPPED);
    $rememberMe = $request->get('remember');
    
    $validate = $this->user->validate([$email, $password], function($response){
      if ($response['error']) {
        return view("admin/index", [
          "title" => "Proses masuk",
          "error" => $response["message"]
        ]);
      }
      
      $this->session = $this->user->session();
      $this->session->set('id', $response['data']->id);

      return $response['data'];
    });

    if ($rememberMe === "on") {
      $cookieName = "user";
      $cookieValue = $this->session->get('id');
      $pathname = $request->pathname;

      setcookie($cookieName, $cookieValue, time() + (86400 * 30), $pathname);
    }

    if (property_exists($this, "session")) {
      if (!empty($this->session->get('id'))) {
        return $this->redirectTo('admin/dashboard');
      }
    }

    return $validate;
  }
}