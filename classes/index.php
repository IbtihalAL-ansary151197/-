<?php 

include 'dp.php'
// class admin {

// var $name;
// var $email;

// function __construct($objName,$objEmail){
//      $this->name = $objName;
//      $this->email =$objEmail;
  

// }
// function getName(){

//   return $this->name;
// }

// function getEmail(){
//    return $this->email;
// }

//  function __destruct(){
//       echo '<br>helo';
//  }
// }
// $obj = new admin ('ebthal','ebthal@email.com');


// echo $obj->getName();
// echo '<br>';
// echo $obj->getEmail();



class user{
  
    private $name;
    private $email;
    private $password; 


       public function __construct($val1,$val2,$val3){

         $this->name     = $val1;
         $this->email    = $val2;
         $this->password = $val3;   
    
    }


   public function register(){
      # Create Db Obj 
      $dbObj = new DataBase;

      $sql = "insert into users (name,email,password) values ('$this->name','$this->email','$this->password')";

      $result = $dbObj->DoQuery($sql);
      
      return $result;
   }


}




?>