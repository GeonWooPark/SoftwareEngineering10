<?php
   include 'db.php';
   // 데이터 베이스 연결.
   $link = connect_db($host, $dbid, $dbpw, $dbname);
   mysqli_set_charset($link, "utf8");
   // POST로 아이디 비밀번호 전달받음.
   $id = isset($_POST['username']) ? $_POST['username'] : '';
   $pw = isset($_POST['pass']) ? $_POST['pass'] : '';
   // 일치하는 아이디, 비밀번호가 있는지 체크.
   $sql = "select * from User where ID='$id' and Password='$pw'";
   $result = mysqli_query($link,$sql);
   $count = mysqli_num_rows($result);


   // COUNT가 1보다 작으면 일치하는 데이터가 없으므로 로그인 거절.
   if($count < 1){
     echo ("<script language=javascript> alert('로그인에 실패하였습니다.');</script>");
     echo("<meta http-equiv='Refresh' content='0; URL=login.html'>");
   }else {
   	
     session_start();
     // 데이터 가져오기
     $row = mysqli_fetch_array($result);

     $_SESSION['id'] = $id;
     $_SESSION['pw'] = $pw;
     $_SESSION['wh'] = $row['Name'];
      echo("<meta http-equiv='Refresh' content='0; URL=../index.php'>");
   
     
//     $_SESSION['point'] = $row["point"];
//     $_SESSION['coupon'] = $row["coupon"];
    
   }
 ?>
