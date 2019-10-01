<?php
require_once "dbtools.inc.php";
$book_name=$_POST["book_name"];
$owner=$_COOKIE["account"];

$link=create_connection();

$sql = "SELECT * FROM list WHERE book_name='$book_name' ";
$result=execute_sql($link,"cashier_online",$sql);
if(mysqli_num_rows($result)==1)
{
    mysqli_free_result($result);
    mysqli_close($link);
    header("refresh:3;url=new_book_form.html");
    print ("此活動已被登入<br>");
}
else
{
    $sql="SELECT * FROM list";
    $result=execute_sql($link,"cashier_online",$sql);
    $booknumber = mysqli_num_rows($result) + 1;

    $sql="insert into list(number,book_name,owner) VALUE ('$booknumber','$book_name','$owner')";
    $result=execute_sql($link,"cashier_online",$sql);


    $sql = "CREATE TABLE $book_name(
number INT(6) NOT NULL PRIMARY KEY, 
why VARCHAR(30) NOT NULL,
money INT(6) NOT NULL,
people VARCHAR(10) NOT NULL,
ck BOOLEAN 
)";

    $result=execute_sql($link,"cashier_online",$sql);
    header("refresh:3;url=member.php");
    print ("加入活動成功!<br>");
    mysqli_close($link);

}
?>