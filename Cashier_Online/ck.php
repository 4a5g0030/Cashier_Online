<?php
require_once ("dbtools.inc.php");
$number = $_GET['number'];
$book_name = $_COOKIE['book_name'];
$link = create_connection();
$sql ="UPDATE $book_name SET ck = 1 where number='$number'";
$result=execute_sql($link,"cashier_online",$sql);
mysqli_close($link);
$url="book.php?book_name=$book_name&ow=1";
echo "<script type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";
?>