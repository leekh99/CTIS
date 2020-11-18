<?php 

abstract class User{
   private $username; 
   private $password;
   private $name;


   function __construct($username, $password, $name){
       set_username($username);
       set_password($password);
       set_name($name);
   }

   abstract function viewTestHistory();

   // GETTERS & SETTERS
   function get_username(){
       return $this->$username;
   }

   function set_username($newUsername){
       $this->$username = $newUsername;
   }

   function get_password(){
       return $this->$password;
   }

   function set_password($newPassword){
       $this->$password = $newPassword;
   }

   function get_name(){
       return $this->$name;
   }

   function set_name($newName){
       $this->$name = $newName;
   }

}


?>