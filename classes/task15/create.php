<?php

include 'helpers/db.php';
include 'helpers/function.php';
include 'helpers/validetor.php';
include 'index.php';

 if($_SERVER['REQUEST_METHOD'] == "POST"){

        $validate = new validetor;

        $title     = $validate->clean($_POST['title']); 
        $content   = $validate->clean($_POST['content']);
        
         # Image Details .....
         $ImageTmp   =  $_FILES['image']['tmp_name'];
         $ImageName  =  $_FILES['image']['name'];
         $ImageSize  =  $_FILES['image']['size'];
         $ImageType  =  $_FILES['image']['type']; 
        
         $TypeArray = explode('/',$ImageType);
        
           $errors = [];
           
         if(!$validate->validate ($title,1)){
             $errors['title'] = "Field Required";
           }
        
                
         if(!$validate->validate($content,1)){
              $errors['content'] = " content Field Required";
         }elseif(!$validate->validate($content,2,50)){
              $errors['content'] = " content Length must be >= 50 ch ";
                
            }

         if(!$validate->validate($ImageName,1)){
              $errors['image'] = "Image Field Required";
         }elseif(!$validate->validate( $TypeArray[1],3)){
              $errors['image'] = "Invalid Extension";
            }
            
            
            
            if(count($errors) > 0){
                foreach($errors as $key => $val ){
                    echo '* '.$key.' :  '.$val.'<br>';
                }
            }else{
                
            
                $FinalName = rand(1,100).time().'.'.$TypeArray[1];
            
                $disPath = './Image/'.$FinalName;
            
                  if(move_uploaded_file($ImageTmp,$disPath)){
            
           

              $task = new db($title,$content,$FinalName);
              $reuslt = $db->register();
              if($reuslt){
                   echo 'Data Inserted';

              }else{
                  echo 'error Try again';
              }
            }else{
                echo 'error Trrrrrrry again';
            }

            }
         
 }


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">



            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputName" aria-describedby=""
                    placeholder="Enter Name">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">Content</label>
                <input type="text" name="content" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <input type="file" name="image" class="form-control" id="exampleInputPassword1"
                    placeholder="Password">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
