<?php

abstract class Postageapp_Core {
   
   private $api_key	= '';
   private $host	= 'https://api.postageapp.com';

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



}
