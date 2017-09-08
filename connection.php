<?php
  class database{
      private static $instance = NULL;

      private function __construct() {}

      private function __clone() {}

      public static function getInstance() {
          if (!isset(self::$instance)) {
              $PDO_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
              self::$instance = new PDO('mysql:host=localhost;dbname=toucantech', 'root', '', $PDO_options);
          }
          return self::$instance;
      }
      

  }

 ?>
