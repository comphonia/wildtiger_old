<?php
session_start();

require_once('sqlInterface.php');
$sqlInterface = new sqlInterface();

$target_dir = "../../uploads/";
$uploadOk = 1;
$isError = false; 
$hasErrorMessage = false; //
$error = "";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate Input
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
    $price = trim(filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT));
    $desc = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
    if(empty($name) || empty($price) || empty($desc) || empty($category)) {
        $isError = true;
        $hasErrorMessage = true;
        $error = "Please fill in the required fields";
    } else{
        //passed
        $isError = false;
    }
    // Check if image file is a actual image or fake image
    if(!$isError){
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $hasErrorMessage = true;
            $error = "File is not an image.";
            $uploadOk = 0;
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $hasErrorMessage = true;
            $error = "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 2000000) {
            $hasErrorMessage = true;
            $error = "Sorry, your file is too large. Max size is 2MB";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
           && $imageFileType != "gif" ) {
            $hasErrorMessage = true;
            $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $isError = true;
            if($hasErrorMessage == false){
                $error = "Sorry, your file was not uploaded.";
            }
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $isError = false;
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                $isError = true;
                $error = "Sorry, there was an error uploading your file.";
            }
        }
    }
    if($isError == false){
        //Post to db
         $sqlInterface->postMenuItem($name,$_FILES["fileToUpload"]["name"],number_format((float)$price, 2, '.', ''),$desc,number_format($category));
    }
        $_SESSION["isError"] = $isError;
        $_SESSION["errorMessage"] = $error;
        header("Location: http://localhost/wildtiger-rnb/admin/additem.php");
}
?>