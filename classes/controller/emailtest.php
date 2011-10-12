<?php

class Controller_Emailtest extends Controller {

   public function action_index() {
      
      $to = 'al@pinpointsocial.com';
      $from = 'hello@pinpointsocial.com';
      $subject = 'A Test';
      $message = 'XZOMG';

      $pa = PostageApp::instance();
      $pa->to($to);
      $pa->from($from);
      $pa->subject($subject);
      $pa->message($message);

      $ret = $pa->send();

      echo Debug::vars($ret);
      
   }

}
