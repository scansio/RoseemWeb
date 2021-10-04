<?php 
include 'connect.php';

class displayResultSet{
private $con = null;

    function result(){
        $conn = connector::connect("roseemdb");
        // Get images url from the database
        $query = $conn->query("SELECT * FROM `dailyTransact` ORDER BY `_id` ASC LIMIT 31");
       $this::$con = array(array(), array());
        $noOfItems = $query->num_rows;

        for ($i = 0; $i < $noOfItems; $i++) {
            $row = $query->fetch_assoc();
            $totalAmount = $row["totalAmount"];
            $expenseDescription = $row["expenseDescription"];
            $savedBalance = $row["savedBalance"];
            $leftChange = $row["leftChange"];
            $day = $row["day"];
            $expense = $row["expense"];
            $dayOfWeek = $row["dayOfWeek"];
            $month = $row["month"];
            $year = $row["year"];
            $user = $row["user"];
            $this::$con[$i][0] = $totalAmount;
            $this::$con[$i][1] = $expenseDescription;
            $this::$con[$i][2] = $savedBalance;
            $this::$con[$i][3] = $leftChange;
            $this::$con[$i][4] = $day;
            $this::$con[$i][5] = $expense;
            $this::$con[$i][6] = $dayOfWeek;
            $this::$con[$i][7] = $month;
            $this::$con[$i][8] = $year;
            $this::$con[$i][9] = $user;
        }
        return $this::$con;  
    }
}
?>