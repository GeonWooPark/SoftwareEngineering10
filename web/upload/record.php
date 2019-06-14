<?php session_start();
	include 'db.php';
	$link = connect_db($host,$dbid,$dbpw,$dbname);
	mysqli_set_charset($link,"utf8");
?>
<!DOCTYPE HTML>
<!--
	VOICEYOU by LEE JU HYEONG
	see2818@naver.com
	hello world!
-->
<html lang="ko">
	<head>
		<title>VOICE YOU</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->

		<style>
.recode input[type=name]{
      /* Size and position */
      width: 100%;
      height: 40px;
      padding: 8px 4px 8px 10px;

      /* Styles */
     margin-bottom: -10px;
      border: 1px solid #4e3043; /* Fallback */
      border: 1px solid rgba(78,48,67, 0.8);
      background: white;
      border-radius: 7px;
      box-shadow:
          0 1px 0 rgba(255,255,255,0.2),
          inset 0 1px 1px rgba(0,0,0,0.1);
      -webkit-transition: all 0.3s ease-out;
      -moz-transition: all 0.3s ease-out;
      -ms-transition: all 0.3s ease-out;
      -o-transition: all 0.3s ease-out;
      transition: all 0.3s ease-out;

      /* Font styles */
      font-family: 'Arial';
      color: black;
      font-size: 15px;
  }
  </style>


	</head>
	<body onload="show(); show2()">

		<!-- Header -->
			<header id="header" class="skel-layers-fixed">
				<h1><a href="../index.php">VOICE YOU</a></h1>
				<?php
					if(isset($_SESSION["id"])) {
						//include 'db.php';
						//echo "<script>alert('smooth1')</script>";
						//$link = connect_db($host, $dbid, $dbpw, $dbname);
						$getid= $_SESSION['id'];
						//mysqli_set_charset($link, "utf8");
						$select_query = "select ID, Seen from User_comment where user_id='$getid'"; 
						$result_set = mysqli_query($link, $select_query);
						$select_queryt = "select teacher, pass from User where ID='$getid'";
						$result_sett = mysqli_query($link, $select_queryt);	

		
						$flag = 1;
						$count = 0;

						$rowt = mysqli_fetch_assoc($result_sett);


						while($row = mysqli_fetch_assoc($result_set)){
							//echo "<script>alert('smooth1')</script>";
							if($row["Seen"]==$flag and!($getid == $row["ID"])){
								$count++;
							}
						}
						if($count == 0){
				?>
				<a  href="#nav">Menu</a>
				<?php
						}else {
				?>
				<a style="color:red;" href="#nav">Menu</a>
				<?php
						}
					}else {
				?>
				<a  href="#nav">Menu</a>
				<?php
					}
				?>
			</header>

		<!-- Nav(메뉴) -->
		<?php if(!isset($_SESSION["id"])) { ?> <!--로그인 x-->
			<nav id="nav">
				<ul class="links">
					<li><a href="../index.php">Home</a></li>
					<li><a href="../login/login.html">Login</a></li>
					<li><a href="../join/join.php">Join</a></li>
					<li><a href="../upload/upload.php">Upload</a></li>
					<li><a href="../chart/chart.php">Chart</a></li>
				</ul>
			</nav>
			<?php }else { ?> <!--로그인 o-->
			<nav id="nav">
				<ul class="links">

					<?php 
						if($rowt["teacher"]==$flag) { //선생님
					?>
					<li><a href="#" style="text-transform: none;"><img src="../images/person.jpg" style="width: auto; height:20px;">&nbsp;<?php echo $_SESSION["wh"];?>&nbsp;teacher</a></li>
					<?php
						}else if($rowt["pass"]==$flag){ //사용자
					?>
					<li><a href="#" style="text-transform: none;"><img src="../images/person.jpg" style="width: auto; height:20px;">&nbsp;<?php echo $_SESSION["wh"];?>&nbsp;student</a></li>
					<?php
						}else {
					?>
					<li><a href="#" style="text-transform: none;"><img src="../images/person.jpg" style="width: auto; height:20px;">&nbsp;<?php echo $_SESSION["wh"];?>&nbsp;</a></li>
					<?php
						}
					?>

					<li><a href="../index.php">Home</a></li>
					<li><a href="../logout/logout.php">Logout</a></li>
					<li><a href="../upload/upload.php">Upload</a></li>
					<li><a href="../chart/chart.php">Chart</a></li>

					<?php 
						if($rowt["teacher"]==$flag) { //선생님
					?>
					<li><a href="#">Teacher page</a>
						<ul>
							<li><a href="teacher/upload.php">upload</a></li>
							<li><a href="teacher/dashboard.php">Dashboard</a></li>
							<li><a href="teacher/edit_text.php">Edit text</a></li>
						</ul>
					</li>
					<?php
						}
					?>

					<?php
						if($count == 0) {
					?>
					<li><a href="#"><img src="images/notification1.png" alt="알림" style="width: auto; height: 1.25em; vertical-align:middle;" >&nbsp;Notification</a><li>
					<?php
						}else {
					?>
					<li><a href="#"><?php echo $count; ?><img src="images/notification2.png" alt="알림" style="width: auto; height: 1.25em; vertical-align:middle;" >&nbsp;Notification</a><li>
					<?php
						}
					?>
				</ul>
			</nav>
			<?php } ?>

		<!-- Main -->
			<section id="main" class="wrapper" style="line-height:normal;">
				<div class="container" style="width:800px;">
					<header class="major special">
						<h2>RECORD</h2>
						<p>해당 스크립트를 녹음하여 업로드 해보세요!</p>
					</header>
					<hr>
					
					
					<!-- record -->


					<?php
						$http_host = $_SERVER['HTTP_HOST'];
						$request_uri = $_SERVER['REQUEST_URI'];
						$url = 'http://' . $http_host . $request_uri;

						$strTok =explode('?' , $url);
						$category_id=$strTok[1]; //차트 카테고리 저장
						$url_id=$strTok[2];      //차트의 index 값 저장
						
						$_SESSION['record_category'] = $category_id;
						$_SESSION['record_index'] = $url_id;
						
					

						$link = connect_db($host, $dbid, $dbpw, $dbname);
						mysqli_set_charset($link, "utf8");
						$sql = "SELECT * FROM Chart_script WHERE Chart_category='$category_id' AND index_id='$url_id'";
						$result = mysqli_query($link, $sql);
						$row = mysqli_fetch_array($result);
					?>


					<div class="example" style="padding: 6% 5% 5%; border: 1px solid #ccc;">Script<br><br><?php echo $row['script']; ?></div>

  					<hr>
					
  					<h3>녹음</h3>
					  <p style="line-height:2em;">녹음시작 버튼을 누르면 녹음이 시작됩니다.<br>
					  정지버튼을 누르면 녹음이 중지됩니다.<br>
					  녹음을 마치고 들어보기 버튼을 누르면 다시 들어볼 수 있습니다.<br>
					  다운로드 버튼을 누르면 녹음된 파일이 컴퓨터에 저장됩니다.</p>
					  <div class="record" style="padding: 3% 2% 3%; text-align: center; margin-bottom: 20px; border: 1px solid #ccc; background: #f2f2f2; line-height:2em;">
  						<div style="display:none;"></div>
						<div>
						  	<p id="REC" style="margin-top:-5px; margin-bottom:3px; padding-bottom: 5px ;" onload="show()" ></p>  
							<span style="vertical-align:middle; text-align: center; width: 100% ; padding-bottom: 0px;">
								<img src="../images/red_record.png" style="width: 14px; height: 14px; vertical-align: middle; margin-top:-3px;">
								<font size="2em" color="black" style="vertical-align: middle;">&nbsp;REC</font>
							</span> 
							&nbsp;&nbsp;&nbsp;<span id="time"></span>
						</div>

						<div style="margin-top:-3px; padding-bottom: 5px" onload="show2()">
							<span style="vertical-align:middle; text-align: center; width: 100% ; padding-bottom: 0px;">
								<img src="../images/green_play.png" style="width: 14px; height: 14px; vertical-align: middle; margin-top:-3px;">
								<font size="2em" color="black" style="vertical-align: middle;">PLAY</font>
							</span> 
							&nbsp;&nbsp;<span id="time2"></span>
						</div>
					
						<div>
							
						<!--녹음-->						
							<button type="button" class="buttona" id="onoff" onclick="button_onclick();" style="min-width:95px;">
								녹음시작
							</button>
						<!--정지-->
						  	<button type="button" class="buttonb" onclick="button_onclick3();" style="min-width:95px;"> 
								정지
							</button>
						<!--재생-->
							<button  type="button" class="buttonc" id="play" onclick="button_onclick2(this.id);" style="min-width:95px;">
								들어보기
							</button>
						<!--다운-->
							<button type="button" class="buttond"  style="min-width:95px;">
								다운로드
							</button>
						</div>
					</div>
					
					<hr>

					<div class="form_01">     
						<!--<form name="fwrite" id="fwrite" action="" onsubmit="" method="post"> -->
						<form class="recode" action="transfer_test.php" id="fwrite" method="post" enctype="multipart/form-data" >
							
							<h3>제작된 음성 파일 업로드</h3>
							<p style="line-height:2em;">녹음하고 컴퓨터에 저장된 파일을 업로드하는 공간입니다.<br>
							업로드를 하면 사용자들과 전문가가 녹음 파일을 듣고 피드백을 합니다.<br>
							업로드 할 때의 게시글 제목을 입력하고, 녹음파일을 선택한 후 업로드 버튼을 누르면 완료됩니다.
							</p>

							<p>
								<!--<label for="name">제목</label>-->
								<input type="name" id="name" name="title" placeholder="제목을 입력하세요" required>
							</p>

							<div class="bo_w_flie write_div" style="margin: 5px 0; position:relative;">
								<div class="file_wr write_div" style="border: 1px solid #ccc; background: #fff; color: #000; vertical-align:middle; border-radius: 3px; padding:5px; height:40px; margin:0; positon:relative;">

									
									<input type="file" name="uploaded_file" id="fileToUpload" class="frm_file" style=" width: 100%; margin-bottom:5px; display:block;"><br><br>
								</div>
								
							</div>
							<div style="padding-bottom: 10px" ></div>

							<div class="btn_confirm" style="margin-left:auto; margin-right:auto;  min-width:70px; text-align:right; line-height:normal;">
								<input type="submit" value="업로드" id="btn_submit"  name="submit" accesskey="s" class="btn_submit btn" style="min-width:70px;" >
							</div>
						</form>
						<hr>
  					<div>








 					






					<!-- record -->
					

				</div>
			</section>

		<!-- Footer -->
		<footer id="footer">
				<div class="inner">
					<ul>
						<div>
							<a href="#" style="text-decoration:none">이용약관</a> | <a href="#" style="text-decoration:none">개인정보처리방침</a>
						</div>
					</ul>

					<ul class="icons">
						<li><a href="#" class="icon fa-facebook">
							<span class="label">Facebook</span>
						</a></li>
						<li><a href="#" class="icon fa-twitter">
							<span class="label">Twitter</span>
						</a></li>
						<li><a href="#" class="icon fa-instagram">
							<span class="label">Instagram</span>
						</a></li>
						<li><a href="#" class="icon fa-linkedin">
							<span class="label">LinkedIn</span>
						</a></li>
					</ul>
					<ul>
						<span>경북대학교</span><br>
						<span>2019 1학기 소프트웨어 공학</span><br>
						<span>교수님 : 정설영</span><br>
						<span>팀원 : 박건우, 이은지, 이주형, 리카이신</span> &nbsp <span>15조</span><br>
						
						
					</ul>

					<ul class="copyright">
						<li>Copyright &copy; 2019 Voiceyou, All rights reserved.</li>
						<!--
						<li>Images: <a href="http://unsplash.com">Unsplash</a>.</li>
						<li>Design: <a href="http://templated.co">TEMPLATED</a>.</li>
						-->
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>









			<script language="javaScript">
 var btn_record_count=0;
 var btn_record_count2=0;
 var time;
 var current_time;
 var test_text="나와라!!!";

//녹음버튼에 대한 함수
function button_onclick(){
  
  if(btn_record_count == "0"){
    btn_record_count=1;        
    document.getElementById("onoff").setAttribute('class', 'buttona');
    reset();
    start();
  }
  else{
    alert("녹음 취소");
    btn_record_count=0;       
    document.getElementById("onoff").setAttribute('class', 'buttonb');
    reset();
    reset2();
  }
}

  //재생버튼에 대한 함수
function button_onclick2(id){
  
    btn_record_count2=1;        
    document.getElementById(id).setAttribute('class', 'buttonc');
  
    reset2(time);
    start2();
  
}
 //중지 버튼에 대한 함수
function button_onclick3(){
  
  time = stop();
  //alert("stop time:"+time);
  
}


  </script>

  <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="../../web-recorder-master/js/MediaStreamRecorder.min.js"></script>
  <script type="text/javascript" src="../../web-recorder-master/js/waveform-playlist.var.js"></script>
  <script type="text/javascript" src="../../web-recorder-master/js/web-audio-editor.js"></script>
  <script type="text/javascript" src="../../web-recorder-master/js/emitter.js"></script>
  
  <script type="text/javascript" src="../../web-recorder-master/js/new_stopwatch.js"></script>
  <script type="text/javascript" src="../../web-recorder-master/js/new_stopwatch2.js"></script>









			

	</body>
</html>