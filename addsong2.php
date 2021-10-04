<?php
require_once 'connect.php';
// If file upload form is submitted 
$status = $statusMsg = ''; 
$connect = connector::connect("scansio");
if($_SERVER["REQUEST_METHOD"] == "POST"){ 
    $status = 'error'; 
    if(!empty($_FILES["add"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["add"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileSize = $_FILES["add"]["size"];
        $filePath = $image = $_FILES['add']['tmp_name'];
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
             
            //$imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $insert = $connect->query("INSERT INTO `image` (`name`, `size`, `type`, `path`) VALUES ($fileName, $fileSize, $fileType, $filePath)"); 
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 
?>