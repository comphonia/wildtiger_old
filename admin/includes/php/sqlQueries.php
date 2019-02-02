<?php

$sql = new Sql();

if($sql->getMenuItems())
{
    var_dump($sql->getData());
}


class Sql{
    private $data = [];
    private $conn;
    function __construct(){
        try{
          $this->conn = new PDO("sqlite:".__DIR__."/../wildfire.db");
          $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(Exception $e){
          echo $e->getMessage();
          exit;
        }
    }
    
    function getData()
    {
        return $this->data;
    }
    
    function querydb($stmt,$verb){
        $data = '';
        try {
            $stmt->execute();

             if($verb == "GET"){
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    array_push($this->data,$row);
                }
             }
                return true;
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        return false;
    }
    
    
    function postMenuItem($name,$image,$price,$description,$category)
    {
        $type = "card_lg";
        $availability = "true";
        // prepare sql and bind parameters
        $stmt = $this->conn->prepare("INSERT INTO `menu_item` (id,name,image,price,description,type,availability) VALUES (null,:name,:image,:price,:description,:type,:availability) ");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':availability', $availability);
        //query stmt
        if($this->querydb($stmt,"POST"))
        {
            $lastInsertedId = $this->conn->lastInsertId();
            //post to category table
            $stmt = $this->conn->prepare("INSERT INTO `item_category` (itemId,category) VALUES (:itemId,:category)");
            $stmt->bindParam(':category', $category);
            $stmt->bindParam(':itemId', $lastInsertedId);
            return $this->querydb($stmt,"POST");
            
        }else return false;
    }
    
  function getMenuItems()
    {
        // prepare sql and bind parameters
        $stmt = $this->conn->prepare("SELECT id,name,image,price FROM `menu_item`");
        //query stmt
        return $this->querydb($stmt,"GET");
    }
    
    
    
    

    // End Class    
}
?>
