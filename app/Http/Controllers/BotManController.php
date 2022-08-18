<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
  /**
   * Place your BotMan logic here.
   */
  public function handle()
  {

    $botman = app('botman');
    $botman->hears('{message}', function ($botman, $message) {
      if ($message == 'Hello' || 'hello' || 'Hi' || 'hi') {
        $this->askName($botman);
      } else {
        $botman->reply("Wait for few moments for response. ");
      }
    });

    $botman->listen();
  }

  /**
   * Place your BotMan logic here.
   */

  public function askName($botman)
  {
    $botman->ask('Hi, What is your name ?', function (Answer $answer) {
      $name = $answer->getText();

      $this->say('Nice to meet you '.strtoupper($name));
    });
  }
  // public function askEmail($botman)
  // {
  //   $botman->ask('Can I know your email ?', function (Answer $answer) {
  //     $email = $answer->getText();

  //     $this->say('Thankyou. I will mail you at'.strtoupper($email));
  //   });
  // }
}
