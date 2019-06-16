<?php
session_start();
  include 'db.php';
  include_once('mailer.lib.php');
  
  
  function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
  
  

  // 데이터 베이스 연결.
  $link = connect_db($host, $dbid, $dbpw, $dbname);

  mysqli_set_charset($link, "utf8");

  // POST로 전달받은 데이터 받아옴.
  $id = $_POST['id'];
  $email = $_POST['email'];
  $num = generateRandomString(11);
  
  
  $subject ="hi";//이메일제목
  $msg = "인증코드 11자리 : "."".$num;//이메일 내용(인증코드)
  $from="tester";//발신자 이름

  // userinfo 테이블에서 id 비교
  $sql = "select ID from User where ID='$id' and Email='$email'";
  $result = mysqli_query($link,$sql);
  $count = mysqli_num_rows($result); // 찾은 행의 갯수

  // 행의 갯수가 1보다 작으면 아이디가 없으므로 다시 돌아감.
  if($count < 1){
   echo ("<script language=javascript> alert('ID, Email 가입 정보가 맞지 않습니다.');</script>");
    echo("<meta http-equiv='Refresh' content='0; URL=pw_rest.php'>");
    
  }else{
   $_SESSION['id'] = $id;
   $_SESSION['email'] = $email; 
   
   $sql2 = "update Temp set Number='$num' where Email='$email'";
   $result2 = mysqli_query($link,$sql2);
   
   if($result2){
   mailer( $from, "see2818@naver.com", $email, $subject, $msg, 1);

   echo ("<script language=javascript> alert('해당 이메일로 인증번호를 발송했습니다.');</script>");
   
  echo("<meta http-equiv='Refresh' content='0; URL=pw_reset.php'>");
   }
  /*
    function genRandom($length = 5) { //랜덤 문자열 생성
        $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $char .= 'abcdefghijklmnopqrstuvwxyz';
        $char .= '0123456789';
        $char .= '!@#%^&*-_+=';
        $result = '';
        for($i = 0; $i <= $length; $i++) {
            $result .= $char[mt_rand(0, strlen($char))];
        }
        return($result);
    }
     $genRandom=genRandom(10);
    echo $genRandom;
    
 */
 
   // 메일발송 시작 메일발송이 되지 않아 비밀번호 재설정 하는 곳으로 넘어가게 만듬..
 
   /*
    $nameFrom = "aa";

    $frommail='bb';
    $subject = 'VOICEYOU 비밀번호 재발급'; //제목
    $body="귀하의 ID $id 에 대한 로그인은 아래 비밀번호로 진행하실 수 있습니다.\r\n"
    $body.="귀하의 비밀번호는 $genRandom 입니다.\r\n 재발급 후 비밀번호 재설정으로 새로운 비밀번호를 설정할 수 있습니다.\r\n"
    
    $header .= "Return-Path: <". $frommail .">\r\n"; //내용 맨 윗부분에 삽입된 말
	$header .= "From: ". $nameFrom ." <". $frommail .">\r\n";
	$header .= "VOICEYOU 비밀번호 재발급\r\n";


	$result = mail($email, $subject, $body, $header, $frommail);


    if(!$result) {
     echo ("<script language=javascript> alert('메일전송실패!, 메일을 보낼 수 없습니다.');</script>"
     echo("<meta http-equiv='Refresh' content='0; URL=login.html'>");
     } else {

    $sql2 = "UPDATE User SET Password = '$genRandom' WHERE ID='$id' AND Email='$email'";
   
    $result2 = mysqli_query($link,$sql2);

    if($result2){
      echo ("<script language=javascript> alert('비밀번호 재발급이 되었습니다. 재발급 후 비밀번호 재설정으로 새로운 비밀번호를 설정할 수 있습니다.');</script>");
      echo("<meta http-equiv='Refresh' content='0; URL=login.html'>");
    }else{
      echo "에러 발생 : ";
      echo mysqli_error($link);
    }
    
     }*/
     
     
  }

  mysqli_close($link);

 ?>
