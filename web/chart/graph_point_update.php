<?php
  include 'db.php';

 session_start(); 
    
 $id=trim($_SESSION["id"]);
 $chart_id=trim($_SESSION['chart_id']);
 $user_id=trim($_SESSION['user_id']);
 $category_id=trim($_SESSION['category_id']);
 
 $star_input = $_POST['star-input'];
  $star_input2 = $_POST['star-input2'];
  $star_input3 = $_POST['star-input3'];
  $star_input4 = $_POST['star-input4'];
  $star_input5 = $_POST['star-input5'];
  $comment = $_POST['wr_content'];
  //echo "\n0:".$star_input;
  //echo "\n1:".$star_input2;
  //echo "\n2:".$star_input3;
  //echo "\n3:".$star_input4;
  //echo "\n4:".$star_input5;
  //echo "\n4:".$comment;
  
  if (isset($_POST['star-input'])){  // 넘어온 평가값이 없을 시 예외
     //echo $_POST['star-input'];

  	if(!isset($_SESSION["id"])) { //로그인 하고 평가하는 지 예외
  	
  		echo ("<script>alert(\"로그인 후 등록하실 수 있습니다.\");</script>");
  		}
	 else{

 //echo "\n id:".$id;
  	// 데이터 베이스 연결.
  $link = connect_db($host, $dbid, $dbpw, $dbname);
  
 	
  mysqli_set_charset($link, "utf8");
  $sql = "SELECT pronunciation, vocalization, voice_bulk, voice_speed, voice_tone, sympathy, participants FROM User_Voice_Point 
  WHERE ID='$user_id' AND Chart_id='$chart_id' AND Category='$category_id'";
  $result = mysqli_query($link,$sql);
  $row = mysqli_fetch_array($result);
 	
  $pronunciation = $row['pronunciation'];
  $vocalization = $row['vocalization'];
  $voice_bulk = $row['voice_bulk'];
  $voice_speed = $row['voice_speed'];
  $voice_tone = $row['voice_tone'];
  $participants = $row['participants'];
  
  $pronunciation = $pronunciation+$star_input;
  $vocalization = $vocalization+$star_input2;
  $voice_bulk = $voice_bulk+$star_input3;
  $voice_speed = $voice_speed+$star_input4;
  $voice_tone = $voice_tone+$star_input5;
  $participants= $participants+1; //참여자 수 1 증가
 	//echo "\n start";
  //mysqli_set_charset($link, "utf8");
 
  $sql = "select ID from User_comment where ID='$id' AND user_id='$user_id' AND chart_id='$chart_id' AND category_id='$category_id'";
  
  $result = mysqli_query($link,$sql);
  //echo "\n start2";
  $count = mysqli_num_rows($result); // 찾은 행의 갯수
 //echo "\n start3";
//echo "\ncount:".$count;
  // 행의 갯수가 1보다 작으면 중복되는 comment가 없으므로 등록.
  if($count < 1){
  	
  	$sql = "UPDATE User_Voice_Point SET pronunciation = '$pronunciation' , vocalization = '$vocalization', voice_bulk = '$voice_bulk', voice_speed = '$voice_speed', 
  	voice_tone = '$voice_tone', sympathy = '0', participants = '$participants' WHERE ID='$user_id' AND Chart_id='$chart_id' AND Category='$category_id'";
    $result = mysqli_query($link,$sql);
  	
  	//echo "\ncount:".$count;
  	
  	$today = date("Y-m-d"); //현재 날짜 저장
    //echo $today;
    
    $Seen = 1;//알림
    
    
    if("$id"=="$user_id"){//본인 게시물에 본인이 댓글쓴것은 제외
      $Seen = 0;//0으로 바꿔줌
    }
   $sql = "insert into User_comment(id,seen,user_id,chart_id,category_id,comment,pronunciation,vocalization,voice_bulk,voice_speed,voice_tone,day) 
   select '$id','$Seen','$user_id','$chart_id','$category_id','$comment','$star_input','$star_input2','$star_input3','$star_input4','$star_input5','$today' 
    from dual where not exists(select id,user_id,chart_id,category_id from User_comment
    where id = '$id' and user_id='$user_id' and chart_id = '$chart_id' and category_id = '$category_id')";
    $result = mysqli_query($link,$sql);
    
    if($result){

      echo ("<script language=javascript>alert(\"평가가 완료되었습니다.\");</script>");
 
    }else{
      //echo "SQL문 처리중 에러 발생 : ";
      echo ("<script language=javascript>alert(\"에러 발생, 다시 진행해 주세요.\");</script>");
      echo mysqli_error($link3);
    }
    // 행의 갯수가 1보다 크면 중복되는 아이디가 존재하므로 회원가입 승인 안함.
  }else{
 
    echo ("<script language=javascript> alert('이미 등록한 코멘트가 있습니다.');</script>");
   
  }

  mysqli_close($link);
 }
  
	 }
	 else{
	 echo ("<script language=javascript> alert('별점 평가를 진행해 주세요,');</script>");
    }
 ?>
<script>location.replace('grade.php?<?php echo $category_id;?>?<?php echo $chart_id;?>?<?php echo $user_id;?>');</script>
