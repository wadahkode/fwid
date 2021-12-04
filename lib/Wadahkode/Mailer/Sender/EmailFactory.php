<?php

namespace Wadahkode\Mailer\Sender;

use Mailjet\Resources;

class EmailFactory
{
  static public function sent($from, $to, $subject, $message)
  {
    $userName = "e1616255773ed24b4a22114b8103bacb";
    $password = "b2757feb388ab8cdd3253e885c386108";

    $mail = new \Mailjet\Client($userName, $password, true, [
      "version" => "v3.1"
    ]);

    $body = [
      'Messages' => [
          [
              'From' => [
                  'Email' => $from,
                  'Name' => "Wadahkode Official"
              ],
              'To' => [
                  [
                      'Email' => $to,
                      'Name' => "You"
                  ]
              ],
              'Subject' => $subject,
              'TextPart' => "Greetings from Mailjet!",
              'HTMLPart' => $message
          ]
      ]
    ];

    $response = $mail->post(Resources::$Email, ["body" => $body]);

    return $response->success() && $response->getData();
  }
}