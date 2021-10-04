<?php
// Include the database configuration file
include 'connect.php';
$conn = connector::connect("scansio");
// Get images url from the database
$query = $conn->query("SELECT * FROM `images` ORDER BY `_names` ASC");
if($_REQUEST == null){
    header('location: nosImage.html');
    exit();
    //echo "<script>alert('Null Value')</script>";
}else{
    if ($_GET['nos'] == 0){
       // echo "<script>alert('Number of Image cant be 0')</script>";
        header('location: nosImage.html');
        exit();
    }else{
        $nos = $_GET['nos']; ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>
               Images
            </title>
            <meta charset="UTF-8">
            <meta http-equiv="Content-Type" content="text/html">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.css">
            <link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap-grid.css">
            <link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap-reboot.css">
            <link rel="stylesheet" href="formstyle.css">
            <script src="scripts/jquery3.9.0.js"></script>
            <script src="jquery/jquery-ui.min.js"></script>
            <script src="bootstrap-4.0.0/dist/js/bootstrap.js"></script>
            <script src="bootstrap-4.0.0/js/dist/button.js"></script>
            <script src="scripts/myScript.js"></script>
        </head>
        <body >
            <div class="container popover-body row txt-con">
                <?php
                    $con = array(array(), array(), array());
        $noOfItems = $query->num_rows;

        $ith = 0;
        $jth = 0;
        $counter = 0;
        while ($counter < 3) {
            
            do {$row = $query->fetch_assoc();
                $con[$ith][$jth] = $row["_paths"];
                echo $con[$ith][$jth];
                $jth++;
            } while ($jth <= $noOfItems);
            
            do {$row = $query->fetch_assoc();
                $con[$ith][$jth] = $row["_names"];
                echo $con[$ith][$jth];
                $jth++;
            } while ($jth <= $noOfItems);
            
            do {$row = $query->fetch_assoc();
                $con[$ith][$jth] = $row["_types"];
                echo $con[$ith][$jth];
                $jth++;
            } while ($jth <= $noOfItems);
            $counter++;
    
        }
        //echo $con[2][2];
        
        /* for ($i = 0; $i < $noOfItems; $i++) {
             $row = $query->fetch_assoc();
             if(($row['_types'] == "jpg") || ($row['_types'] == "JPG") || ($row['_types'] == "png") || ($row['_types'] = "PNG")){
                 $imageURL = $row["_paths"];
                 $alt = $row["_names"];
                 $type = $row["_types"];
                 $con[$i][$j] = $imageURL;
                 $con[$j][$i] = $alt;
             }else {
                 $noOfItems--;
             }

         }

         while(($row = $query->fetch_assoc()) != null){
             while($jth != 3){
                 $iURL = $con[$ith][$jth];
                 $ialt = $con[$ith][$jth];
                 $type = $con[$ith][$jth]; ?>
                         <div class="imgContainer col-sm-3 container <?php echo "i".$i."j"?>">
                             <img class="img card-img container" type="image/<?php echo $type;?>" src="<?php echo $iURL; ?>" alt="<?php echo $ialt; ?>"/>
                         </div>
                 <?php
             }
         }*/ ?>
                
            </div>
        </body>
    </html>   
    <?php
    }
}
?>