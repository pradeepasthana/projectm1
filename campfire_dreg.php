<?php
$db_name = "adminify_wp2";
$mysql_username = "campfire";
$mysql_password = "allowme300";
$server_name = "166.62.10.144";
$conn = mysqli_connect($server_name, $mysql_username, $mysql_password,$db_name);

$domain = $_POST["web"];
$name = $_POST["dname"];
$type = $_POST["type"];
$loc = $_POST["loc"];
$username = $_POST["user"];
$owner = $_POST["admin"];


$sql_qry="INSERT into Groups_Domains (Domain,Name,Type,Location,Username,Owner) VALUES ('$domain','$name','$type','$loc','$username','$owner')";


if(!mysqli_query($conn,$sql_qry))
{
echo "fail: ".mysqli_error($conn);

}
else{
echo "Inserted 1";
}

$conn->close();

?>