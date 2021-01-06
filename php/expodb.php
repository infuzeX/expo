<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json; charset=UTF-8");

require './db.php';
require './response.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

if(isset($data)){

//store object data in variable
$name = $data ->name;
$email = $data ->email;
$contact = $data ->contact;
$whatsapp = $data ->wnumber;
$college = $data ->cname;
$year = $data ->year;

/*insert data*/
$query = "INSERT INTO form (`name`,`email`, `contact`, `whatsapp` ,`college`, `year`) VALUES ('$name','$email',$contact,$whatsapp,'$college', $year)";
$inserted = mySqli_query($con , $query);

$res = new Response;
if($inserted){
    $res -> success = true;
    $res -> message = "successfull submitted";
   }else{
    $res -> success = false;
    $res -> message = "failed to submit";
}
/*insert data*/
echo json_encode($res);
}

?>