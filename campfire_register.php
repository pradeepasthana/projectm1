<?php
$db_name = "adminify_wp2";
$mysql_username = "campfire";
$mysql_password = "allowme300";
$server_name = "166.62.10.144";
$conn = mysqli_connect($server_name, $mysql_username, $mysql_password,$db_name);

$name = $_POST["Name"];
$userpas = $_POST["pass"];
$usern = $_POST["user"];
$pemail = $_POST["peremail"];
$orgemail = $_POST["oemail"];
$domain = $_POST["domain"];
$desig = $_POST["desig"];

$dstatus=0;

$sql_qry="INSERT into Groups_Login (Email,Password) VALUES ('$pemail','$userpas')";
$dcheck_qry="Select * from Groups_Domains where Username='$domain'";

if(!mysqli_query($conn,$dcheck_qry))
{
echo "fail: ".mysqli_error($conn);
$conn->close();
}

$dcheck_result=mysqli_query($conn,$dcheck_qry);
if(mysqli_num_rows($dcheck_result) > 0) {

$dstatus=1;
}


if(!mysqli_query($conn,$sql_qry))
{
echo "fail: ".mysqli_error($conn);
$conn->close();
}

$sql_qry="INSERT into Groups_Bio (Username,Name,Personal_Email,Organizational_Email,Organization_Domain,Designation) VALUES ('$usern','$name','$pemail','$orgemail','$domain','$desig')";


if(!mysqli_query($conn,$sql_qry))
{
echo "fail: ".mysqli_error($conn);

}
else{
echo "Inserted ".$dstatus."+".$usern;
}

$conn->close();

?>