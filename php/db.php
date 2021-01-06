<?php
//mysqli_connect('hostname' , 'username' , 'password' , 'databasename');
$con = mysqli_connect ('localhost','padhhigh_demoform','padhhigh','padhhigh_demoform');

if(!$con){
    echo $con->error_log;
}

?>