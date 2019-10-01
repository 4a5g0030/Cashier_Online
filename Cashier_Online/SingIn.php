<?php
require_once ("dbtools.inc.php");
$account=$_POST["account"];
$password=$_POST["password"];

$link=create_connection();

$sql="SELECT * FROM member where account='$account'and password='$password'";

$result=execute_sql($link,"cashier_online",$sql);

if(mysqli_num_rows($result)==0)
{
    mysqli_free_result($result);
    mysqli_close($link);
    header("refresh:3;url=Home.html");
    print ("帳號或密碼錯誤<br>");
}
elseif (mysqli_num_rows($result)==1)
{
    mysqli_free_result($result);
    mysqli_close($link);
    setcookie('account',$account);
    header("Location:member.php");
}
?>