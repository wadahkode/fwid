<?php

namespace App\Http\Controller;

use Wadahkode\Http\Request;
use Wadahkode\Mailer\Sender\EmailFactory;

class HelpController extends Controller
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
    return view("password", [
      "title" => "Help password | Wadahkode"
    ]);
  }

  public function changePassword(Request $request)
  {
    $randomLink = base_url() . "admin/help/password/s/modify/" . getCodeHash();
    $to = $request->email;
    $from = "mvp.dedefilaras@gmail.com";
    $subject = "Change password";
    $message = "
      <div style='font-size: 14pt;'>
        <p>Untuk mengganti password anda silahkan klik link dibawah ini:</p>

        <a href='$randomLink' style='background: red; color: white; padding: 1rem 1rem; border: 1px solid #ccc; border-radius: 5px; font-size: 16pt; margin: 0.75rem auto; text-decoration: none;'>reset password</a>

        <p>atau salin link dibawah ini :<br/>
          <pre>$randomLink</pre>
        </p>
      </div>";

    $email = EmailFactory::sent($from, $to, $subject, $message);

    if ($email) {
      $cookieName = "email_reset_password";
      $cookieValue = $request->email;
      $pathname = $randomLink;

      setcookie($cookieName, $cookieValue, time() + (180 * 5), $pathname);

      return view("password", [
        "title" => "Reset password sent | Wadahkode",
        "message" => "Permintaan untuk mengatur ulang kata sandi telah dikirim pada email anda, silahkan cek pada kotak masuk email anda atau spam."
      ]);
    }

    return $email;
  }

  public function confirmChangePassword(Request $request)
  {
    preg_match("/".$request->id."/", $request->pathInfo, $m);

    if ($m && isset($request->emailResetPassword)) {
      $email = $request->emailResetPassword;

      $statement = $this->user->findBy('email', $email);

      if (gettype($statement) !== "array") {
        return view('errors/404');
      }

      return view("password", [
        "title" => "Confirm new password | Wadahkode",
        "reset" => true
      ]);
    }

    return view('errors/404');
  }

  public function updatePassword(Request $request)
  {
    if (isset($request->emailResetPassword)) {
      $statement = $this->user->findBy('email', $request->emailResetPassword);

      if (is_array($statement)) {
        if (password_verify($request->password, $statement[0]->password)) {
          return view("password", [
            "title" => "Confirm new password | Wadahkode",
            "message" => "Kata sandi sudah digunakan sebelumnya."
          ]);
        }

        $statusChangePassword = $this->user->updatePassword($request->emailResetPassword, $request->password);

        if ($statusChangePassword) {
          $cookieName = "email_reset_password";
          $cookieValue = "";

          setcookie($cookieName, $cookieValue, time() - 3600);

          return $this->redirectTo("admin");
        }
      }
      
      return view('errors/404');
    }

    return view('errors/404');
  }
}