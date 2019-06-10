<?php
    include_once('mailer.lib.php');
    include 'db.php';


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

    $num=generateRandomString();//인증코드 생성

    $email = $_POST['email'];//수신자
    $subject ="hi";//이메일제목
    $msg = "인증코드 10자리 : "."".$num;//이메일 내용(인증코드)
    $from="tester";//발신자 이름

    $check_email=preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email);//이메일 형식체크 true, false 리턴

    


    //echo "<script>alert('smooth1')</script>;";


    // User 테이블에서 Email 찾기
    $sql = "select Email from User where Email='$email'";
    $result = mysqli_query($link,$sql);
    $count = mysqli_num_rows($result); // 찾은 행의 갯수


    // Temp 테이블에서 Email 찾기
    $sql2 = "select Email from Temp where Email='$email'";
    $result2 = mysqli_query($link,$sql2);
    $count2 = mysqli_num_rows($result2); // 찾은 행의 갯수
    


     // 행의 갯수가 1보다 크면 중복되는 이메일 이므로 인증 거절. 이메일 형식체크
    if($count >= 1 or $check_email==false){
        echo ("<script language=javascript> alert('이미 등록된 이메일이거나 올바른 이메일 형식이 아닙니다.');</script>");
        echo("<meta http-equiv='Refresh' content='0; URL=join.php'>");


        //echo "<script>alert('smooth2')</script>;";

    }else{//User중복없고 이메일 형식 만족 -> db 저장

        if($count2 < 1){//Temp 중복없음 

            $sql = "insert into Temp(Email,Number) select '$email','$num' from dual where not exists(select Email,Number from Temp where Email = '$email' and Number = '$num')";
            $result = mysqli_query($link,$sql);
            //echo "<script>alert('smooth3')</script>;";

            if($result){//db저장후 해당 이메일로 인증코드 발송

                //echo "<script>alert('smooth4')</script>;";
                //mail($email, $subject, $msg);
                mailer( $from, "see2818@naver.com", $email, $subject, $msg, 1);

                echo ("<script language=javascript> alert('해당 이메일로 인증번호를 발송했습니다.');</script>");
                echo("<meta http-equiv='Refresh' content='0; URL=join2.php'>");
            }else{
                echo "SQL문 처리중 에러 발생 : ";
                echo mysqli_error($link);
            }
        }else{//Temp 중복있음 -> update

            $sql2 = "update Temp set Number='$num' where Email='$email'";
            $result2 = mysqli_query($link,$sql2);

            if($result2){//db저장후 해당 이메일로 인증코드 발송

                //echo "<script>alert('smooth4')</script>;";
                //mail($email, $subject, $msg);
                mailer( $from, "see2818@naver.com", $email, $subject, $msg, 1);

                echo ("<script language=javascript> alert('해당 이메일로 인증번호를 재발송했습니다.');</script>");
                echo("<meta http-equiv='Refresh' content='0; URL=join2.php'>");
            }else{
                echo "SQL문 처리중 에러 발생 : ";
                echo mysqli_error($link);
            }
        }
        
    }

    mysqli_close($link);
    
    
    
?>