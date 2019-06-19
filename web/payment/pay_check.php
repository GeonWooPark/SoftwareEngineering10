<?php
    session_start();
    include 'db.php';
    
    $link = connect_db($host, $dbid, $dbpw, $dbname);

    mysqli_set_charset($link, "utf8");

    $id = $_SESSION["id"];
    $flag = 1;

    $sql = "update User set pass='$flag' where ID='$id'";

    $result = mysqli_query($link,$sql);

    if($result){
       echo ("<script language=javascript> alert('결제가 완료 되었습니다.');</script>");
       echo("<meta http-equiv='Refresh' content='0; URL=../index.php'>");
    }else{
       echo "SQL문 처리중 에러 발생 : ";
       echo mysqli_error($link);
    }
    mysqli_close($link);

?>