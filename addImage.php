
<?php
require_once 'connect.php';
$connect = connector::connect("scansio");
if($_SERVER["REQUEST_METHOD"] == "POST"){
        $target_dir = "uploads/";
        $nfile = count($_FILES["add"]["name"]);
    for ($lp = 0; $lp < $nfile; $lp++){ 
        $target_file = $target_dir . strval($_FILES["add"]["name"][$lp]);
        $name = htmlSpecialChars(strval(pathinfo($_FILES["add"]["name"][$lp], PATHINFO_FILENAME)));
        $size = strval($_FILES["add"]["size"][$lp]);
        $type = strval(pathinfo($_FILES["add"]["name"][$lp], PATHINFO_EXTENSION));
        $path = strval($_FILES['add']['tmp_name'][$lp]);
        
        
        echo "</br>name: ".$name."</br>size: ".$size
        ."</br>type: ".$type."</br>path: ".$target_file."</b></br>";
        
        if(move_uploaded_file($path, $target_file)){
            if ($connect -> query("INSERT INTO `images`(`_names`, `_sizes`, `_types`, `_paths`) VALUES (\"$name\", \"$size\", \"$type\", \"$target_file\")")) {
                 echo "successfully executed </br>";
            } else echo "Error: ".$connect -> error;
        }
        
    }
   echo "</br>".$nfile." files uploaded";
}

?>