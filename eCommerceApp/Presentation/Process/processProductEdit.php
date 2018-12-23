<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//November 5, 2018
//This is my own work.
//processes product edits; updates and uploads the photo of the product if needed

ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../Header.php';
require_once '../../AutoLoader.php';

echo "<br><br><br>";
//FIRST, check the photo uploads
//check photo # 1
    //checks the if there was a new photo upload
    if (!$_FILES['fileToUpload1']["name"] == 0) {
        //check if the photo is able to uploaded
        //https://www.w3schools.com/php/php_file_upload.asp
        $target_dir = "/Applications/MAMP/htdocs/eCommerceApp/ProductPhotos/";
        $target_file = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
            if($check !== false) {
                echo "File 1 is an image - " . $check["mime"] . ". ";
                $uploadOk = 1;
            } else {
                echo "File 1 is not an image. ";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file 1 already exists. ";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload1"]["size"] > 500000) {
            echo "Sorry, your file 1 is too large. ";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed for file 1. ";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file 1 was not uploaded. ";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file)) {
                    echo "The file 1 ". basename( $_FILES["fileToUpload1"]["name"]). " has been uploaded. ";
                } else {
                    echo "Sorry, there was an error uploading your file 1. ";
                }
            }
        //saves value from the new photo from the edit product form data
        $ph = $_FILES['fileToUpload1'];
        
        //extract just the file name of the photo and return as a string
        $like_ph1 = $ph['name'];
        echo "<br><br>";
    }
    
    //if there was not a photo upload...
    else {    
        //saves value from the current photo from the edit product form data
        $like_ph1 = $_POST['photo1'];
        
    }

//check photo # 2    
    //checks the if there was a new photo upload
    if (!$_FILES['fileToUpload2']["name"] == 0) {
        //check if the photo is able to uploaded
        //https://www.w3schools.com/php/php_file_upload.asp
        $target_dir = "/Applications/MAMP/htdocs/eCommerceApp/ProductPhotos/";
        $target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
            if($check !== false) {
                echo "File 2 is an image - " . $check["mime"] . ". ";
                $uploadOk = 1;
            } else {
                echo "File 2 is not an image. ";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file 2 already exists. ";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload2"]["size"] > 500000) {
            echo "Sorry, your file 2 is too large. ";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed for file 2. ";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file 2 was not uploaded. ";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) {
                    echo "The file 2 ". basename( $_FILES["fileToUpload2"]["name"]). " has been uploaded. ";
                } else {
                    echo "Sorry, there was an error uploading your file 2. ";
                }
            }
            //saves value from the new photo from the edit product form data
            $ph = $_FILES['fileToUpload2'];
            
            //extract just the file name of the photo and return as a string
            $like_ph2 = $ph['name'];
            echo "<br><br>";
            
    }
    
    //if there was not a photo upload...
    else {
        //saves value from the current photo from the edit product form data
        $like_ph2 = $_POST['photo2'];
    }
   
    
//check photo # 3    
    //checks the if there was a new photo upload
    if (!$_FILES['fileToUpload3']["name"] == 0) {
        //check if the photo is able to uploaded
        //https://www.w3schools.com/php/php_file_upload.asp
        $target_dir = "/Applications/MAMP/htdocs/eCommerceApp/ProductPhotos/";
        $target_file = $target_dir . basename($_FILES["fileToUpload3"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload3"]["tmp_name"]);
            if($check !== false) {
                echo "File 3 is an image - " . $check["mime"] . ". ";
                $uploadOk = 1;
            } else {
                echo "File 3 is not an image. ";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file 3 already exists. ";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload3"]["size"] > 500000) {
            echo "Sorry, your file 3 is too large. ";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed for file 3. ";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file 3 was not uploaded. ";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file)) {
                    echo "The file 3 ". basename( $_FILES["fileToUpload3"]["name"]). " has been uploaded. ";
                } else {
                    echo "Sorry, there was an error uploading your file 3. ";
                }
            }
            //saves value from the new photo from the edit product form data
            $ph = $_FILES['fileToUpload3'];
            
            //extract just the file name of the photo and return as a string
            $like_ph3 = $ph['name'];
            echo "<br><br>";
            
    }
    
    //if there was not a photo upload...
    else {
        //saves value from the current photo from the edit product form data
        $like_ph3 = $_POST['photo3'];
    }
    
//update the product if the photo checks out
    //saves the rest of the edit product form data
    $id = $_POST['id'];
    $p = $_POST['productname'];
    $d = $_POST['description'];
    $pr = $_POST['price'];
    $q = $_POST['quantity'];
    
    //create a new instance of the product to update its info
    $product = new Products($id, $p, $d, $pr, $q, $like_ph1, $like_ph2, $like_ph3);
    
    //use the BusinessService class to update the product
    $service2 = new ProductBusinessService();
    $editSuccess = $service2->updateOne($id, $product);
    if($editSuccess) {
        echo "Changes have been saved!";
    }
    else{
        echo "Error! Changes have NOT been saved.";
    }
?>