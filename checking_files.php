<?php

if (isset($_POST["submit"])){
    
    $arrn = count($_FILES["add"]["name"]);
    //$tmpFilePath = realpath($_FILES['add']['tmp_name']);
    $target_dir = "testupload/";
    for ($n = 0; $n < $arrn; $n++){
    //$name = strval(pathinfo($_FILES["add"]["name"][$n], PATHINFO_FILENAME));
    $name = strval($_FILES["add"]["name"][$n]);
    $size = strval($_FILES["add"]["size"][$n]);
    $type = pathinfo($_FILES["add"]["name"][$n], PATHINFO_EXTENSION);
    $path = $_FILES['add']['tmp_name'][$n];
    echo "</br>name: ".$name."</br>size: ".$size
        ."B</br>type: ".$type."</br>path: ".$path."</b></br>";
        if(!move_uploaded_file($path, $target_dir.$name/*$newFilePath*/))
        echo $arrn." files not uploaded </br>";
      //$move = move_uploaded_file($path, $target_file);
      
      $newpath = realpath($target_dir.$name);
      echo "The realpath is: ".$newpath."</br>";//$newpath;
}

echo "</br></br>".$arrn." files are successfully uploaded </br>";
}
else echo "error";

?>