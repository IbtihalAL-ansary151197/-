<?php 

class db {

var  $server     = "localhost";
var  $dbName     = "tasks";
var  $dbUser     = "root";
var  $dbPassword = "";
var  $con         ='';
   # Create Connection ... 

function __construct(){
    $this->con =   mysqli_connect($this->server,$this->dbUser,$this->dbPassword,$this->dbName);
    if( $this->con ){
        echo mysqli_connect_error();
    }

}
function doQurery($sql){
    $result = mysqli_query($this->con,$sql);
    return $result;
 }


function __destruct(){

 mysqli_close( $this->con );
}


}

$obj = new db();
$sql  = "select * from rule";
$dep =  $obj->doQurery($sql);

// while($data = mysqli_fetch_assoc($dep)){
//     echo '*' .$data['title']. '<br>';
// }

?>



