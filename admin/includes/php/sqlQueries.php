<?php
////
//$sql = new Sql();
//
//if($sql->getMenuItems("appetizers"))
//{
//    var_dump($sql->getData());
//}else echo "no dice";
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
        $this->data = [];
        try {
            if($verb == "GET"){
                $stmt->execute();
                $arr = $stmt->fetch(PDO::FETCH_ASSOC);
                $stmt->execute();    
                if($arr == true && count(array_filter($arr))){
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        array_push($this->data,$row);
                    }
                }
                return true;
            } else return($stmt->execute());
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        return false;
    }
    function postMenuItem($name,$image,$price,$desc,$cId)
    {
        $type = "card_lg";
        $availability = "true";
        // prepare sql and bind parameters
        $stmt = $this->conn->prepare("INSERT INTO `menu_item` (id,name,image,price,description,type,availability,categoryId)
VALUES (null,:name,:image,:price,:description,:type,:availability,:categoryId) ");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $desc);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':availability', $availability);
        $stmt->bindParam(':categoryId', $cId);
        //query stmt
        return $this->querydb($stmt,"POST");
    }
    function getMenuItems($category)
    {
        // prepare sql and bind parameters
        $stmt = $this->conn->prepare("SELECT M.id,name,image,price,description,type,availability,categoryId
FROM `menu_item` as M
LEFT JOIN `item_category` as C
ON M.categoryId = C.id
WHERE C.category = :category");
        $stmt->bindParam(':category', $category);
        //query stmt
        return $this->querydb($stmt,"GET");
    }
    function getAllCategories()
    {
        // prepare sql and bind parameters
        $stmt = $this->conn->prepare("SELECT DISTINCT category from `item_category`");
        //query stmt
        return $this->querydb($stmt,"GET");
    }
    // End Class    
}
?>
