<?php

namespace App\Http\Controller;

use Wadahkode\Http\Request;

class PostinganController extends Controller
{
  public function __construct()
  {
    $this->posts = $this->model('posts');
  }

  public function publish(Request $request)
  {
    $statement = $this->posts->publish([
      "id"          => md5($request->get("uuid")),
      "title"       => $request->get("title"),
      "content"     => htmlspecialchars($request->get("content")),
      "foto"        => empty($request->get("foto")) ? "https://www.freeiconspng.com/uploads/no-image-icon-13.png" : $request->get('foto'),
      "author"      => $request->get("author"),
      "labels"      => $request->get("label"),
      "description" => $request->get("description"),
      "createdAt"   => date('Y-m-d H:i:s'),
      "updatedAt"   => date('Y-m-d H:i:s')
    ]);
    $status = [];

    if (is_array($statement)) {
      array_push($status, $statement);
    } else {
      if ($statement) {
        array_push($status, [
          "success" => true,
          "message" => "post berhasil."
        ]);
      } else {
        array_push($status, [
          "success" => false,
          "error"   => [
            "type"  => "FAILED",
            "message" => "post gagal."
          ]
        ]);
      }
    }

    echo json_encode($status);
  }
}