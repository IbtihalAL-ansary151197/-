<?php
 class task{

private $title;
private $content;
private $image;

public function __construct($title,$content,$image){


    $this->title   = $title;
    $this->content = $content;
    $this->image   = $image;
}

public function register(){

    $dbObj = new db;
    $sql   = "insert into users(title, content, image) values('$this->title','$this->content','$this->FinalName',)";
    $ruslt = $dbObj->doQurery($sql);
    return $ruslt;
}

 }


?>