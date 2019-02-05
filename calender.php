<html>
<style>
ul {list-style-type: none;}
body {font-family: Verdana, sans-serif;}

/* Month header */
.month {
    padding: 30px 25px;
    width: 96.26%;
    background: #1abc9c;
}

/* Month list */
.month ul {
    margin: 0;
    padding: 0;
}

.month ul li {
    color: white;
    font-size: 20px;
    text-transform: uppercase;
    letter-spacing: 3px;
}

/* Previous button inside month header */
.month .prev {
    float: left;
    padding-top: 10px;
}

/* Next button */
.month .next {
    float: right;
    padding-top: 10px;
}

/* Weekdays (Mon-Sun) */
.weekdays {
    margin: 0;
    padding: 10px 0;
    background-color:#ddd;
}

.weekdays li {
    display: inline-block;
    width: 13.6%;
    color: #666;
    text-align: center;
}

/* Days (1-31) */
.days {
    padding: 10px 0;
    background: #eee;
    margin: 0;
}

.days li {
    list-style-type: none;
    display: inline-block;
    width: 13.6%;
    text-align: center;
    margin-bottom: 5px;
    font-size:12px;
    color:#777;
}

/* Highlight the "current" day */
.days li .active {
    padding: 5px;
    background: #1abc9c;
    color: white !important
}
</style>
<body>
<?php
	$date=date("d");
	$month=date("M");
	$fullmonth=date("F");
	$year=date("Y");
	$day=date("D");
	$day=date("l");
	echo $date."-";
	echo $month."-";
	
echo date("l")."<br>";
echo "<div class=\"month\"><ul><li class=\"prev\">&#10094;</li><li class=\"next\">&#10095;</li>";

echo "<center><li>$fullmonth<br><span style=\"font-size:18px\">$year</span></li></center></ul></div>";

echo "<center><ul class=\"weekdays\"><li>MONDAY</li><li>TUESDAY</li><li>WEDNESDAY</li><li>THUSDAY</li><li>FRIDAY</li><li>SATURDAY</li><li>SUNDAY</li></ul></center>";

echo "<ul class=\"days\">"; 
for($i=1; $i<=cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y")); $i++)
{
  if($i==date("d"))
  echo "<span class=\"active\">"; 
  echo "<li>$i</li>";
  if($i==date("d"))
  echo "</span>";
}
echo "</ul></body></html>";
?>
  
