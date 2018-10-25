<?php
include 'includes/config.php';
$page = 1;
$query = "SELECT USERS.FullName,COUNT(BOOKING.id) as 'requests' FROM `BOOKING`,`USERS` WHERE USERS.EmailId=BOOKING.userEmail group by FullName ";
$res = $conn->query($query);

if($res){

    $username=array();
    $requests=array();

    while($rows = $res->fetch_assoc()){

        array_push($username,$rows['FullName']);
        array_push($requests,$rows['requests']);
    }

    $reportObj= new \stdClass();
    $reportObj->username=$username;
    $reportObj->request=$requests;
    
    $myJSON = json_encode($reportObj);
    
    echo $myJSON;

}
?>