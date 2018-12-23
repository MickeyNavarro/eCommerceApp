<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//November 5, 2018
//This is my own work.
//processes product additions to the database

require_once '../../Header.php';
require_once '../../AutoLoader.php';
echo "<br><br><br>";
//FIRST, check the photo upload 
//Check photo # 1
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
                echo "The file 1 ". basename( $_FILES["fileToUpload1"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file 1. ";
            }
        }

        echo "<br><br>";
        
        
//check photo # 2
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
                    echo "The file 2 ". basename( $_FILES["fileToUpload2"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file 2. ";
                }
            }
            
            echo "<br><br>";
            
            
//check photo # 3
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
                        echo "The file 3 ". basename( $_FILES["fileToUpload3"]["name"]). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file 3. ";
                    }
                }
                echo "<br><br>";
                
                
//Second, add the new product into the database if the photo checks out 
    //save new product form data
    $productname = $_POST['productname'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $photo1 = $_FILES['fileToUpload1']; 
    $photo2 = $_FILES['fileToUpload2'];
    $photo3 = $_FILES['fileToUpload3'];
    
    //check if registration form data is valid
    if ($productname == NULL || trim($productname)== "") {
        exit ("Product Name is a required field");
    }
    if ($description == NULL || trim($description)== "") {
        exit("Description is a required field");
    }
    if ($price == NULL || trim($price)== "") {
        exit ("Price is a required field");
    }
    if ($quantity == NULL || trim($quantity)== "") {
        exit("Quantity is a required field");
    }
    
    //use the SecurityService class to create a user (REGISTER)
    $service = new ProductBusinessService();
    $newProductSuccess = $service->addNewProduct();
    if($newProductSuccess) {
        echo "<br><br><br>Hooray! You have created a new product.";
    }
    else{
        echo "<br><br><br>Error! Product was unable to be created.";
    }
?>