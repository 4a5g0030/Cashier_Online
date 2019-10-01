<?php
require_once ("dbtools.inc.php");
$name=$_POST["username"];
$account=$_POST["account"];
$password=$_POST["password"];
$email=$_POST["e_mail"];
$phone=$_POST["phone"];

$link = create_connection();

$sql="SELECT * FROM member WHERE account='$account'";
$result=execute_sql($link,"cashier_online",$sql);

if(mysqli_num_rows($result)==1)
{
    mysqli_free_result($result);
    mysqli_close($link);
    header("refresh:3;url=Join.html");
    print ("此帳號已被註冊<br>");
}

else
{
    $sql = "insert into member(name,account,password,email,phone) value ('$name','$account','$password','$email','$phone')";
    $result=execute_sql($link,"cashier_online",$sql);
    mysqli_close($link);
    header("refresh:3;url=Home.html");
    print ("註冊成功<br>");
}
?>