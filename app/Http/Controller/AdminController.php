<?php
namespace App\Http\Controller;

use Wadahkode\Http\Request;

class AdminController extends Controller
{
  public function __construct(Request $request)
  {
    $this->user     = $this->model('users');
    $this->session  = $this->user->session();

    
    if (!empty($this->session->get('id')) && !empty($request->user)) {
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