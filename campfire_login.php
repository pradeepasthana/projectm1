<?php 

$db_name = "adminify_wp2";
$mysql_username = "campfire";
$mysql_password = "allowme300";
$server_name = "166.62.10.144";
$conn = mysqli_connect($server_name, $mysql_username, $mysql_password,$db_name);

$user_name = $_POST["user_name"];
$user_pass = $_POST["password"];
$mysql_qry = "select * from Groups_Login where Email like '$user_name' and password like '$user_pass';";
$result = mysqli_query($conn ,$mysql_qry);

$bio=array();

if(mysqli_num_rows($result) > 0) {

$bio_query = "select * from Groups_Bio where Personal_Email = '$user_name'";
$bio_result = mysqli_query($conn ,$bio_query);
$bio_row = mysqli_fetch_array($bio_result);
array_push($bio,array("name"=>$bio_row[1],"email_p"=>$bio_row[2],"email_o"=>$bio_row[3],"domain"=>$bio_row[4],"desig"=>$bio_row[5],"dtype"=>$bio_row[6],"v_status"=>$bio_row[7]));

echo json_encode(array("bio"=>$bio));

}
else {

echo "fail";
}
 
?>
 
