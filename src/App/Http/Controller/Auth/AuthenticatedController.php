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

    if (!empty($this->session->get('id'))) {
      return $this->redirectTo('dashboard');
    }

    return $validate;
  }
}