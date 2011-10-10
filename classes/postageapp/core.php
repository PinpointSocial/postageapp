<?php

abstract class Postageapp_Core {
   
   private $api_key	= '';
   private $host	= 'https://api.postageapp.com';
   private $_arguments = array();
   private $variables = array();
   private $template = '';
   

   public static function instance($config = null, $conf_type = 'default') {
      if($config == null) {
	 // Get config from global config
	 $config = Kohana::config('postageapp')->$conf_type;
      }
      return new Postageapp($config);
   }

   public function __construct($config) {
      foreach($config as $key => $value) {
	 $this->$key = $value; 
      }
   }

   public function headers($headers = array()) {
      $this->_arguments['headers'] = $headers;
   }

   public function subject($subject = '') {
      $this->_arguments['headers']['subject'] = $subject;
   }
   
   public function from($from = '') {
      $this->_arguments['headers']['from'] = $from;
   }
   
   public function to($to = array()) {
      $this->_arguments['recipients'] = $to;
   }
      
   public function message($content = '') {
      $this->_arguments['content'] = $content;
   }

   private function payload() {
      $message = array(
	    'api_key'	=> $this->api_key,
	    'uid'	=> sha1(time() . json_encode($this->_arguments)), 
	    'arguments'	=> $this->_arguments,
	    ); 
   }
}
