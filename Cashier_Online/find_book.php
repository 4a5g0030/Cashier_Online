<?php
require_once ("dbtools.inc.php");
$id = $_GET['id'];
if($id == "")
{
    header("Location:member.php");
}
else
{
    $link = create_connection();
    $sql = "select * from list where number = '$id'";
    $result=execute_sql($link,"cashier_online",$sql);
    if (mysqli_num_rows($result) != 1)
    {
        mysqli_free_result($result);
        mysqli_close($link);
        print("請輸入正確的編號");
        header("refresh:3;url=member.php");
    }
    else
    {

        $row = mysqli_fetch_assoc($result);
        $name = $row['book_name'];
        $ow = 0;
        $acc = $_COOKIE['account'];
        if($acc == $row['owner'])
            $ow=1;
        mysqli_free_result($result);
        mysqli_close($link);
        $url = "book.php?book_name=" . $name . "&ow=" . $ow;
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }
}
?>