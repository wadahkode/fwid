<?php

namespace App\Http\Controller;

use Wadahkode\Http\Request;

class TutorialController extends Controller
{
  protected $data = [];

  public function __construct()
  {
    $this->data = $this->model('posts')->findAll();
  }

  public function index()
  {
    return view('tutorials.index', [
      "title"     => "Kumpulan tutorial",
      "posts"     => $this->data
    ]);
  }

  public function delete(Request $request)
  {
    $tutorials = $this->model('posts');
    $result = $tutorials->deleteBy('id', $request->id);
    $status = [];

    if ($result) {
      $status = ["success" => true];
    } else {
      $status = [
        "success" => false,
        "error" => [
          "message" => "Gagal menghapus data!"
        ]
      ];
    }
    
    echo json_encode($status);
  }

  public function detail(Request $request)
  {
    $tuts = $this->model("posts");
    $data = $tuts->findBy("id", $request->id);
    $title = "";

    foreach($data as $d) {
      $title = $d->title;
    }

    return view("tutorials.detail", [
      "title" => $title,
      "posts" => $data]
    );
  }

  public function getTutorial()
  {
    echo(json_encode($this->data));
  }
}