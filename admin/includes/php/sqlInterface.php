<?php
require_once('sqlQueries.php');

class SqlInterface{

    private $sql;
    private $data;
    
    function __construct(){
     $this->sql = new Sql();
    }
    
    function postMenuItem($name,$image,$price,$description,$category){
        if($this->sql->postMenuItem($name,$image,$price,$description,$category)){
           // echo "Items Posted";
        }
    }
    
    function getCategories(){
        if($this->sql->getAllCategories()){
            $categories = $this->sql->getData();
            
            foreach($categories as $cat){  
              echo "<section class='section' id='{$cat['category']}'>
                    <div class='h4 font-weight-bold col my-3'>".ucfirst($cat['category'])."</div>
                    <div class='row mx-auto'>".
                       $this->retMenuItems($cat['category'])." 
                    </div>
                </section>";
            }
        }
    }
  
    function retMenuItems($category){
        if($this->sql->getMenuItems($category)){
            $menuItems = $this->sql->getData();
            $items="";
            foreach($menuItems as $item){
                $items .= "<div class='col-md-4 my-3 menu-item' id=''>
                        <div class='card ' style='width: 100%;'>
                            <div class='card-image'><img class='img-fluid' src='admin/uploads/{$item['image']}' alt='Card image cap'></div>
                            <div class='card-body'>
                                <p class='card-header-text'>{$item['name']}<span class='text-muted float-right'>$".$item['price']."</span></p>
                                <p class='card-text text-muted'>{$item['description']}</p>
                            </div>
                        </div>
                    </div>
                ";
            }
            
            return $items;
        }
    }



}

?>