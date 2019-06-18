<?php
    session_start();
    include 'db.php';
    
    $link = connect_db($host, $dbid, $dbpw, $dbname);

    mysqli_set_charset($link, "utf8");

    $id = $_SESSION["id"];
    $wh = $_SESSION["wh"];
    $flag = 1;

    $head1 = $_POST['head1'];
    $text1 = $_POST['text1'];
    $head2 = $_POST['head2'];
    $text2 = $_POST['text2'];


    $sql = "select * from teacher_intro where id='$id'";
    $result = mysqli_query($link,$sql);
    $count = mysqli_num_rows($result); // 찾은 행의 갯수
    echo $count;

    if($count >= 1) {
      $sql2 = "update teacher_intro set head1='$head1', text1='$text1', head2='$head2', text2='$text2' where id='$id'";//수정요망
      $result2 = mysqli_query($link,$sql2);
      echo ("<script language=javascript> alert('편집이 완료 되었습니다.');</script>");
      echo("<meta http-equiv='Refresh' content='0; URL=dashboard.php'>");
    }else {
      $sql3 = "insert into teacher_intro (id, name, head1, text1, head2, text2) values('$id', '$wh','$head1', '$text1', '$head2', '$text2')";//수정요망
      $result3 = mysqli_query($link,$sql3);
      echo ("<script language=javascript> alert('등록이 완료 되었습니다.');</script>");
      echo("<meta http-equiv='Refresh' content='0; URL=dashboard.php'>");
    }


    
    mysqli_close($link);

?>