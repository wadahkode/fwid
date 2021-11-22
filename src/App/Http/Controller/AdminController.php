<?php
namespace App\Http\Controller;

class AdminController extends Controller
{
  public function __construct()
  {
    $this->user = $this->model('users');

    if (!empty($this->user->session()->get('id'))) {
      return $this->redirectTo('admin/dashboard');
    }
  }

  public function index()
  {
    return view('admin/index', [
      'title' => 'Administrator | Wadahkode'
    ]);
  }
}