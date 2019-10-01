<?php
require_once ("dbtools.inc.php");
$account=$_COOKIE['account'];
$link=create_connection();

$sql="SELECT * FROM list WHERE owner = '$account'";
$result=execute_sql($link,"cashier_online",$sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $account ;?></title>
    </head>
    <body>
    <p><h2>我的帳本 :</h2></p>
    <p>
        <?php
            if(mysqli_num_rows($result)>0)
            {

                while ($row = mysqli_fetch_assoc($result))
                {
                $number=$row["number"];
                $book_name=$row["book_name"];
                $url="book.php?book_name=".$book_name."&ow=1";
                echo "<h3>" . "活動編號 : ". $number . " 活動名稱 : " . $book_name." "."<a href=$url><input type='button' value='連結'></a>" ."</h3>";
                echo "<br>";
                }
            }
        ?>
    </p>
    <a href="new_book_form.html"><input type="button" value="新增活動"></a>
   <br><br>
    <p><h2>搜尋帳本</h2></p>
    <form name="find" method="get" action="find_book.php">
        <input type="text" name="id" />
        <input type="submit" value="搜尋">
    </form>
    </body>
</html>
<?php
mysqli_close($link);
mysqli_free_result($result);
?>