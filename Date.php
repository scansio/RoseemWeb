<?php 
class Date {
    public static $year;
    public static $month;
    public static $dayOfWeek;
    public static $day;
    
    function __construct(){
        $dateObj = getdate();
        Date::$year = $dateObj["year"];
        Date::$month = $dateObj["month"];
        Date::$dayOfWeek = $dateObj["wday"];
        Date::$day = $dateObj["mday"];
    }
}
?>