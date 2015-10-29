<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="30; url=google.com"> <!--refresh every 30 sec-->
<title>
Thank you !
</title>
</head>
<body>
<h1>Thankyou !</h1>
<h4>Here are the details</h4>
<?php
$dsn="mysql:host=localhost; dbname=JSSITPortal";
$username="root";
$password="";


try
{
$conn= new PDO($dsn,$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{echo"connection 1 failed: " . $e->getMessage()."<br>";}



/*$sql  = "CREATE TABLE student_record
(
first_name VARCHAR(20),
last_name VARCHAR(20),
branch VARCHAR(40),
address VARCHAR(40),
ph_no INT(10),
email VARCHAR(40),
topic VARCHAR(40),
comment VARCHAR(100),
time_added TIMESTAMP
)";

try
{$conn->exec($sql);}
catch(PDOException $e)
{echo"connection 2 failed: " ."<br>". $e->getMessage()."<br>";}

*/


$fn= $_POST["fn"];
$ln= $_POST["ln"];
$br= $_POST["br"];
$ad= $_POST["ad"];
$ct= $_POST["ct"];
$em= $_POST["em"];
$tp= $_POST["tp"];
$co= "";
echo $fn."<br>";
echo $ln."<br>";
echo $br."<br>";
echo $ad."<br>";
echo $ct."<br>";
echo $em."<br>";
echo $tp."<br>";
echo $co."<br>";

$sql="INSERT INTO student_record(first_name,last_name,branch,address,ph_no,email,topic,comment) values(:fn,:ln,:br,:ad,:ct,:em,:tp,:co)";

try
{
$st=$conn->prepare($sql);
$st->bindValue(":fn",$fn,PDO::PARAM_STR);
$st->bindValue(":ln",$ln,PDO::PARAM_STR);
$st->bindValue(":br",$br,PDO::PARAM_STR);
$st->bindValue(":ad",$ad,PDO::PARAM_STR);
$st->bindValue(":ct",$ct,PDO::PARAM_INT);
$st->bindValue(":em",$em,PDO::PARAM_STR);
$st->bindValue(":tp",$tp,PDO::PARAM_STR);
$st->bindValue(":co",$co,PDO::PARAM_STR);
$st->execute();


}
catch(PDOException $e)
{echo"connection 3 failed: " ."<br>". $e->getMessage()."<br>";}


$sql="SELECT * FROM student_record";
$rows=$conn->query($sql);
echo "<ol>";
foreach($rows as $row)
{
echo  "<li>" . " first name: " . $row["first_name"];
echo   " last name: " . $row["last_name"] ;
echo   " branch: " . $row["branch"] ;
echo   " address: " . $row["address"] ;
echo   " phone no.: " . $row["ph_no"] ;
echo   " email: " . $row["email"] ;
echo   " topic: " . $row["topic"] ;
echo   " comment: " . $row["comment"] ;
echo   " address: " . $row["time_added"] ."</li>" ;
}
echo "</ol>";

$conn=null;
?>
</body>
</html>
