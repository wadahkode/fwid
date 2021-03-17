<?php
namespace App\Http\Controller;

class AuthenticatedController extends Controller
{
  public function __construct($prop) {
    parent::__construct($prop);
  }

  // Create method
  public function index($request) {
    var_dump($request->email, $request->password);
  }
}