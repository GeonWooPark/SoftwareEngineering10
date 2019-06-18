<?php
session_start();

  include 'db.php';

  // 데이터 베이스 연결.
  $link = connect_db($host, $dbid, $dbpw, $dbname);

  mysqli_set_charset($link, "utf8");

  // POST로 전달받은 데이터 받아옴.
  $password = $_POST['password'];
  $num = $_POST['number'];


$id=$_SESSION['id']; //셋세셔
$email=$_SESSION['email'];


  // userinfo 테이블에서 id 비교
  $sql = "select ID from User where ID='$id' and Email='$email'";
  $result = mysqli_query($link,$sql);
  $count = mysqli_num_rows($result); // 찾은 행의 갯수
  $sql3 = "select Number from Temp where Email='$email'";
  $result3 = mysqli_query($link,$sql3);
  $row= mysqli_fetch_assoc($result3);
  
 
  
if($num == $row["Number"]){
	
  // 행의 갯수가 1보다 작으면 아이디가 없으므로 다시 돌아감.
  if($count < 1){
   echo ("<script language=javascript> alert('아이디를 다시 입력해 주세요');</script>");
    echo("<meta http-equiv='Refresh' content='0; URL=password.html'>");
    
  }else{

  $sql2 = "UPDATE User SET Password = '$password' WHERE ID='$id' AND Email='$email'";
   
    $result2 = mysqli_query($link,$sql2);

    if($result2){
      echo ("<script language=javascript> alert('비밀번호 재설정이 완료되었습니다.');</script>");
      echo("<meta http-equiv='Refresh' content='0; URL=login.html'>");
    }else{
      echo "에러 발생 : ";
      echo mysqli_error($link);
    }
 
     
  }
}else{
	echo "n:".$num;
	echo "r:".$row["Number"];
	
	echo ("<script language=javascript> alert('인증번호가 올바르지 않습니다.');</script>");
	
    echo("<meta http-equiv='Refresh' content='0; URL=password.html'>");
}

  mysqli_close($link);

 ?>
