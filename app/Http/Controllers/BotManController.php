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
         $botman->hears('{message}', function($botman, $message) {
         if ($message == 'Hello')
          {
            $this->askName($botman);
          }
          else
          {
            $botman->reply("write 'Hello' for testing...");
          }
       });

       $botman->listen();

    }

      /**
       * Place your BotMan logic here.
      */

      public function askName($botman)
      {

          $botman->ask('Hi, What is your name ?', function(Answer $answer) {
          $name = $answer->getText();

          $this->say('Nice to meet you'.$name);
        });

      }
}