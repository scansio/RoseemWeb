<?php
require_once 'connect.php';
$con = new connector("roseemdb");
$result = $con::$connect-> query("SELECT * FROM dailytransact;");
foreach ($result as $row){
    echo "<ul>
            <li>Id: ". $row['id']."\n</li>"."<li>Total: N".$row['total_amount']."\n</li>".
     "<li>
            Expense: N".$row['expense']."\n</li>".
     "<li>
            Expense Description: ".$row['expense_description']."\n</li>".
     "<li>
            Remaining Balance: N".$row['saved']."\n</li>".
     "<li>
            Date: ".$row['date']."\n</li></ul>";

}
?>