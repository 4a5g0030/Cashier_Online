<?php
    require_once ("dbtools.inc.php");
    $link=create_connection();
    $book_name = $_COOKIE['book_name'];
    $account = $_COOKIE['account'];
    $why = $_GET['why'];
    $inout = $_GET['inout'];
    $money = $_GET['money'];
    $ck = 0;

    if($inout=="out")
        $money*=-1;

    $sql = "select owner from list where book_name = '$book_name'";
    $result=execute_sql($link,"cashier_online",$sql);
    $row=mysqli_fetch_assoc($result);
    if($row['owner']==$account)
        $ck=1;
    else
        $ck=0;

    $sql ="SELECT * FROM $book_name";
    $result=execute_sql($link,"cashier_online",$sql);
    $number=mysqli_num_rows($result)+1;

    $sql = "insert into $book_name(number,why,money,people,ck) value ('$number','$why','$money','$account','$ck')";
    $result=execute_sql($link,"cashier_online",$sql);

    //mysqli_free_result($result);
    mysqli_close($link);
    $url = "book.php?book_name=$book_name&ow=$ck";
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
?>