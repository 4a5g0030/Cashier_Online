<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script type="text/javascript">
        function check()
        {
            if(adddata.why.value==""||adddata.money.value=="")
            {
                alert("資料請輸入清楚");
                return false;
            }
            else
            {
                adddata.submit();
            }
        }
    </script>
</head>
<body>
<P><h2>
<p><h2>活動名稱 : <?PHP echo $_GET['book_name'] ;?></h2></p>
<p><h2>目前帳目</h2></p>
    <?php
    require_once "dbtools.inc.php";
    $book_name=$_GET["book_name"];
    $ow = $_GET['ow'];
    setcookie('book_name',$book_name);
    $link =create_connection();

    $sql="SELECT * FROM $book_name where ck=1";

    $result=execute_sql($link,"cashier_online",$sql);

    if(mysqli_num_rows($result)>0)
    {
        $tatol=0; $i=1;
        while ($row=mysqli_fetch_assoc($result))
        {
            $tatol+=$row['money'];
            echo  $i++. " " . $row["why"] . " " . $row["money"] . " " . $row["people"] . "<br>";
        }
        echo "結算 : ". $tatol . "<br>";
    }
    echo "<br>";echo "<br>";echo "<br>";echo "<h2>待確認款項 :</h2><br>";;
    if($ow == 1)
    {
        $sql="SELECT * FROM $book_name where ck=0";

        $result=execute_sql($link,"cashier_online",$sql);

        if(mysqli_num_rows($result)>0)
        {
            while ($row=mysqli_fetch_assoc($result))
            {
                $url = "ck.php?number=".$row["number"];
                echo  $row["why"] . " " . $row["money"] . " " . $row["people"] ." <a href=$url><input type='button' value='確認'></a>". "<br>";
            }
        }
    }

    mysqli_close($link);
    mysqli_free_result($result);
    ?>
</h2></P>
    <br><br>
    <p><h2>新增帳目</h2></p>
    <form name="adddata" method="get" action="adddata.php">
        <p>用途</p>
        <input type="text" name="why"/><br>
        <p>收/支</p>
        <input type="radio" name="inout" value="in"checked="checked"/>收入
        <input type="radio" name="inout" value="out"/>支出<br>
        <p>金額</p>
        <input type="text" name="money" /><br><br>
        <input type="button" onclick="check()" value="送出">
    </form>
</body>
</html>