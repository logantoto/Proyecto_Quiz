<?php

Class Conf
{

   private $_domain;
   private $_userdb;
   private $_passdb;
   private $_hostdb;
   private $_db;
   
  private $_emailfromdb;
  private $_emailfromnamedb;
  private $_emailhostdb;
  private $_emailportdb;
  private $_emailuserdb;
  private $_emailpassdb;
  private $_emaillimitdb;


   static $_instance;

   private function __construct(){
      
      require_once 'config.php';
      $this->_userdb=$user;
      $this->_passdb=$password;
      $this->_hostdb=$host;
      $this->_db=$db;

     $this->_emailfromdb=$emailfrom;
     $this->_emailfromnamedb=$emailfromname;
     $this->_emailhostdb=$emailhost;
     $this->_emailportdb=$emailport;
     $this->_emailuserdb=$emailuser;
     $this->_emailpassdb=$emailpass;
     $this->_emaillimitdb=$emaillimit;

   }

   private function __clone(){ }

   public static function getInstance(){
      if (!(self::$_instance instanceof self)){
         self::$_instance=new self();
      }
      return self::$_instance;
   }

   public function getUserDB(){
      $var=$this->_userdb;
      return $var;
   }

   public function getHostDB(){
      $var=$this->_hostdb;
      return $var;
   }

   public function getPassDB(){
      $var=$this->_passdb;
      return $var;
   }

   public function getDB(){
      $var=$this->_db;
      return $var;
   }






   public function getEmailfromdb(){
      $var=$this->_emailfromdb;
      return $var;
   }
    public function getEmailfromnamedb(){
      $var=$this->_emailfromnamedb;
      return $var;
   }
    public function getEmailhostdb(){
      $var=$this->_emailhostdb;
      return $var;
   }
    public function getEmailportdb(){
      $var=$this->_emailportdb;
      return $var;
   }
    public function getEmailuserdb(){
      $var=$this->_emailuserdb;
      return $var;
   }
    public function getEmailpassdb(){
      $var=$this->_emailpassdb;
      return $var;
   }
    public function getEmaillimitdb(){
      $var=$this->_emaillimitdb;
      return $var;
   }





}

?>
