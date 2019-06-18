<?php
  include 'db.php';

  // 데이터 베이스 연결.
  $link = connect_db($host, $dbid, $dbpw, $dbname);

  mysqli_set_charset($link, "utf8");

  // POST로 전달받은 데이터 받아옴.
  $id = $_POST['id'];
  $pw = $_POST['pass'];
  $pw2 = $_POST['pass2'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $num = $_POST['number'];

  // userinfo 테이블에서 id 비교
  $sql = "select ID from User where ID='$id'";
  $result = mysqli_query($link,$sql);
  $count = mysqli_num_rows($result); // 찾은 행의 갯수
  $sql2 = "select Number from Temp where Email='$email'";//메일로 보낸 인증코드
  $result2 = mysqli_query($link,$sql2);//메일로 보낸 인증코드
  $row = mysqli_fetch_assoc($result2);
  
if($pw == $pw2){

  if($num == $row["Number"])//메일로 보낸 인증코드와 사용자가 쓴 인증코드가 일치하는지
  {

    // 행의 갯수가 1보다 작으면 중복되는 아이디가 없으므로 회원가입 승인.
    if($count < 1 ){
      $sql = "insert into User(ID,Password,Name,Email) select '$id','$pw','$name','$email' from dual where not exists(select ID,Password,Name,Email from User
      where ID = '$id' and Password='$pw' and Name = '$name' and Email = '$email')";
      $result = mysqli_query($link,$sql);

      if($result){
        echo ("<script language=javascript> alert('회원 등록을 완료하였습니다.');</script>");
        echo("<meta http-equiv='Refresh' content='0; URL=../login/login.html'>");
      }else{
        echo "SQL문 처리중 에러 발생 : ";
        echo mysqli_error($link);
      }
      // 행의 갯수가 1보다 크면 중복되는 아이디가 존재하므로 회원가입 승인 안함.
    }else{
      echo ("<script language=javascript> alert('이미 등록된 아이디입니다.');</script>");
      echo("<meta http-equiv='Refresh' content='0; URL=join2.php'>");
    }
  }else{

    
    echo ("<script language=javascript> alert('인증코드가 맞지 않습니다.');</script>");
    
      echo("<meta http-equiv='Refresh' content='0; URL=join2.php'>");
  }
}else{
  echo ("<script language=javascript> alert('비밀번호와 확인 비밀번호가 일치 하지 않습니다.');</script>");
    
  echo("<meta http-equiv='Refresh' content='0; URL=join2.php'>");
}
  mysqli_close($link);

 ?>
