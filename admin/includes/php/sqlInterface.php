<?php
require_once('sqlQueries.php');

class SqlInterface{

    private $sql;
    
    function __construct(){
     $this->sql = new Sql();
    }
    
    function postMenuItem($name,$image,$price,$description,$category){
        if($this->sql->postMenuItem($name,$image,$price,$description,$category)){
            echo "Items Posted";
        }
    }



}

?>