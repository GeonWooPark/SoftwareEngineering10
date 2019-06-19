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
<script src = "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>


<style>
.star-input>.input,
.star-input>.input>label:hover,
.star-input>.input>input:focus+label,
.star-input>.input>input:checked+label{display: inline-block;vertical-align:middle;background:url('../images/grade_star3.png')no-repeat;}
.star-input{display:inline-block; white-space:nowrap;}
.star-input>.input{display:inline-block;width:150px;background-size:150px;height:28px;white-space:nowrap;overflow:hidden;position: relative;}
.star-input>.input>input{position:absolute;width:1px;height:1px;opacity:0;}
star-input>.input.focus{outline:1px dotted #ddd;}
.star-input>.input>label{width:30px;height:0;padding:28px 0 0 0;overflow: hidden;float:left;cursor: pointer;position: absolute;top: 0;left: 0;}
.star-input>.input>label:hover,
.star-input>.input>input:focus+label,
.star-input>.input>input:checked+label{background-size: 150px;background-position: 0 bottom;}
.star-input>.input>label:hover~label{background-image: none;}
.star-input>.input>label[for="p1"]{width:30px;z-index:5;}
.star-input>.input>label[for="p2"]{width:60px;z-index:4;}
.star-input>.input>label[for="p3"]{width:90px;z-index:3;}
.star-input>.input>label[for="p4"]{width:120px;z-index:2;}
.star-input>.input>label[for="p5"]{width:150px;z-index:1;}
.star-input>output{display:inline-block;width:60px; font-size:18px;text-align:right; vertical-align:middle;}
</style>
<style>
.star-input2>.input2,
.star-input2>.input2>label:hover,
.star-input2>.input2>input:focus+label,
.star-input2>.input2>input:checked+label{display: inline-block;vertical-align:middle;background:url('../images/grade_star3.png')no-repeat;}
.star-input2{display:inline-block; white-space:nowrap;}
.star-input2>.input2{display:inline-block;width:150px;background-size:150px;height:28px;white-space:nowrap;overflow:hidden;position: relative;}
.star-input2>.input2>input{position:absolute;width:1px;height:1px;opacity:0;}
star-input2>.input2.focus{outline:1px dotted #ddd;}
.star-input2>.input2>label{width:30px;height:0;padding:28px 0 0 0;overflow: hidden;float:left;cursor: pointer;position: absolute;top: 0;left: 0;}
.star-input2>.input2>label:hover,
.star-input2>.input2>input:focus+label,
.star-input2>.input2>input:checked+label{background-size: 150px;background-position: 0 bottom;}
.star-input2>.input2>label:hover~label{background-image: none;}
.star-input2>.input2>label[for="p6"]{width:30px;z-index:5;}
.star-input2>.input2>label[for="p7"]{width:60px;z-index:4;}
.star-input2>.input2>label[for="p8"]{width:90px;z-index:3;}
.star-input2>.input2>label[for="p9"]{width:120px;z-index:2;}
.star-input2>.input2>label[for="p10"]{width:150px;z-index:1;}
.star-input2>output{display:inline-block;width:60px; font-size:18px;text-align:right; vertical-align:middle;}
</style>
<style>
.star-input3>.input3,
.star-input3>.input3>label:hover,
.star-input3>.input3>input:focus+label,
.star-input3>.input3>input:checked+label{display: inline-block;vertical-align:middle;background:url('../images/grade_star3.png')no-repeat;}
.star-input3{display:inline-block; white-space:nowrap;}
.star-input3>.input3{display:inline-block;width:150px;background-size:150px;height:28px;white-space:nowrap;overflow:hidden;position: relative;}
.star-input3>.input3>input{position:absolute;width:1px;height:1px;opacity:0;}
star-input3>.input3.focus{outline:1px dotted #ddd;}
.star-input3>.input3>label{width:30px;height:0;padding:28px 0 0 0;overflow: hidden;float:left;cursor: pointer;position: absolute;top: 0;left: 0;}
.star-input3>.input3>label:hover,
.star-input3>.input3>input:focus+label,
.star-input3>.input3>input:checked+label{background-size: 150px;background-position: 0 bottom;}
.star-input3>.input3>label:hover~label{background-image: none;}
.star-input3>.input3>label[for="p11"]{width:30px;z-index:5;}
.star-input3>.input3>label[for="p12"]{width:60px;z-index:4;}
.star-input3>.input3>label[for="p13"]{width:90px;z-index:3;}
.star-input3>.input3>label[for="p14"]{width:120px;z-index:2;}
.star-input3>.input3>label[for="p15"]{width:150px;z-index:1;}
.star-input3>output{display:inline-block;width:60px; font-size:18px;text-align:right; vertical-align:middle;}
</style>
<style>
.star-input4>.input4,
.star-input4>.input4>label:hover,
.star-input4>.input4>input:focus+label,
.star-input4>.input4>input:checked+label{display: inline-block;vertical-align:middle;background:url('../images/grade_star3.png')no-repeat;}
.star-input4{display:inline-block; white-space:nowrap;}
.star-input4>.input4{display:inline-block;width:150px;background-size:150px;height:28px;white-space:nowrap;overflow:hidden;position: relative;}
.star-input4>.input4>input{position:absolute;width:1px;height:1px;opacity:0;}
star-input4>.input4.focus{outline:1px dotted #ddd;}
.star-input4>.input4>label{width:30px;height:0;padding:28px 0 0 0;overflow: hidden;float:left;cursor: pointer;position: absolute;top: 0;left: 0;}
.star-input4>.input4>label:hover,
.star-input4>.input4>input:focus+label,
.star-input4>.input4>input:checked+label{background-size: 150px;background-position: 0 bottom;}
.star-input4>.input4>label:hover~label{background-image: none;}
.star-input4>.input4>label[for="p16"]{width:30px;z-index:5;}
.star-input4>.input4>label[for="p17"]{width:60px;z-index:4;}
.star-input4>.input4>label[for="p18"]{width:90px;z-index:3;}
.star-input4>.input4>label[for="p19"]{width:120px;z-index:2;}
.star-input4>.input4>label[for="p20"]{width:150px;z-index:1;}
.star-input4>output{display:inline-block;width:60px; font-size:18px;text-align:right; vertical-align:middle;}
</style>
<style>
.star-input5>.input5,
.star-input5>.input5>label:hover,
.star-input5>.input5>input:focus+label,
.star-input5>.input5>input:checked+label{display: inline-block;vertical-align:middle;background:url('../images/grade_star3.png')no-repeat;}
.star-input5{display:inline-block; white-space:nowrap;}
.star-input5>.input5{display:inline-block;width:150px;background-size:150px;height:28px;white-space:nowrap;overflow:hidden;position: relative;}
.star-input5>.input5>input{position:absolute;width:1px;height:1px;opacity:0;}
star-input5>.input5.focus{outline:1px dotted #ddd;}
.star-input5>.input5>label{width:30px;height:0;padding:28px 0 0 0;overflow: hidden;float:left;cursor: pointer;position: absolute;top: 0;left: 0;}
.star-input5>.input5>label:hover,
.star-input5>.input5>input:focus+label,
.star-input5>.input5>input:checked+label{background-size: 150px;background-position: 0 bottom;}
.star-input5>.input5>label:hover~label{background-image: none;}
.star-input5>.input5>label[for="p21"]{width:30px;z-index:5;}
.star-input5>.input5>label[for="p22"]{width:60px;z-index:4;}
.star-input5>.input5>label[for="p23"]{width:90px;z-index:3;}
.star-input5>.input5>label[for="p24"]{width:120px;z-index:2;}
.star-input5>.input5>label[for="p25"]{width:150px;z-index:1;}
.star-input5>output{display:inline-block;width:60px; font-size:18px;text-align:right; vertical-align:middle;}
</style>




	</head>
	<body>

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
							<li><a href="../teacher/upload.php">upload</a></li>
							<li><a href="../teacher/dashboard.php">Dashboard</a></li>
							<li><a href="../teacher/edit_text.php">Edit text</a></li>
						</ul>
					</li>
					<?php
						}
					?>

					<?php
						if($count == 0) {
					?>
					<li><a href="#"><img src="../images/notification1.png" alt="알림" style="width: auto; height: 1.25em; vertical-align:middle;" >&nbsp;Notification</a><li>
					<?php
						}else {
					?>
					<li><a href="#"><?php echo $count; ?><img src="../images/notification2.png" alt="알림" style="width: auto; height: 1.25em; vertical-align:middle;" >&nbsp;Notification</a><li>
					<?php
						}
					?>
				</ul>
			</nav>
			<?php } ?>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container" style="width:1080px;">
					<header class="major special">
						<h2>Grade</h2>
						<p>평가를 해주세요!</p>
						
					</header>
					<hr style=" width:1080px; border:solid 1px black;">
					
					<!-- 시작 -->
						<?php
							$http_host=$_SERVER['HTTP_HOST'];
							$request_uri = $_SERVER['REQUEST_URI'];
							$url = 'http://' . $http_host . $request_uri;


							$strTok =explode('?' , $url);
							$category_id=$strTok[1];
							$chart_id=$strTok[2];
							$user_id=$strTok[3];
							if(!isset($_SESSION)) { 
								session_start(); 
							} 
							$_SESSION['chart_id'] = $chart_id; //session에 저장 후 graph_point_update 페이지로 넘김
							$_SESSION['user_id'] = $user_id; 
							$_SESSION['category_id']=$category_id
						?>

						<?php

							$sql = "SELECT pronunciation, vocalization, voice_bulk, voice_speed, voice_tone, sympathy, participants FROM User_Voice_Point WHERE ID='$user_id' AND Chart_id='$chart_id' AND Category='$category_id'";
							$result = mysqli_query($link,$sql);
							$row2 = mysqli_fetch_array($result);

							$pronunciation = $row2['pronunciation'];
							$vocalization = $row2['vocalization'];
							$voice_bulk = $row2['voice_bulk'];
							$voice_speed = $row2['voice_speed'];
							$voice_tone = $row2['voice_tone'];
							$sympathy = $row2['sympathy'];
							$participants = $row2['participants'];

							if($participants<1) { //아무도 평가하지 않았을 때
								$pro_ave=0;
								$voc_ave=0; 
								$bulk_ave=0;
								$speed_ave=0;
								$tone_ave=0;

							}else {
								$pro_ave=$pronunciation/$participants;
								$voc_ave=$vocalization/$participants; 
								$bulk_ave=$voice_bulk/$participants;
								$speed_ave=$voice_speed/$participants;
								$tone_ave=$voice_tone/$participants;
							}
							$ave=(floor($pro_ave)+floor($voc_ave)+floor($bulk_ave)+floor($speed_ave)+floor($tone_ave))/5;
							$sql = "UPDATE Total_Audio_Contents SET View_Count = '$ave' WHERE Nick_Name='$user_id' AND Chart_id='$chart_id' AND Category='$category_id'";
							$result1 = mysqli_query($link,$sql);
						   
							if($result1){

							}else {
								echo mysqli_error($link);
							}
						?>

						<div id="grade1">
							<div id="grade2">
								<div id="grade3" style="height: 400px;" >
									<div class="graph1">

										<div style="margin-top:-18px; margin-right:0px; width:400px; float:left;"><canvas id="myChart" width="500" height="500"></canvas></div><!--//////////////////////////////////////////-->
									</div>

									<div class="info">
										<table style= "float:right; width:400px;">
											<tbody>
												<tr>
													<th style="vertical-align:middle; padding:0.75em 0.75em 0.75em 0.75em;">평가수</th>
													<td ><?php echo $participants; ?></td>
													<td></td>
												</tr>
											</tbody>
										</table>
									</div>

									<h3 style="text-align:center;">
										목소리의 평균 평점
									</h3>

									


									<div class=info2>
										<table style="width:400px; float:right;">
											<tbody >
												<tr>
													<th style="vertical-align:middle; text-align:right; padding:0.75em 0.75em 0.75em 0.75em;">발성</th>
													<td class="star"><span  style="color:#ffdf00;"><?php for($i=0; $i<floor($pro_ave); $i++){printf("★");} ?></span><?php for($i=0; $i<5-floor($pro_ave); $i++){printf("★");} ?></td>
													<td></td>
												</tr>
												<tr>
													<th style="vertical-align:middle; text-align:right; padding:0.75em 0.75em 0.75em 0.75em;">발음</th>
													<td class="star"><span  style="color:#ffdf00;"><?php 
													for($i=0; $i<floor($voc_ave); $i++){printf("★");} ?></span><?php //별찍기
													for($i=0; $i<5-floor($voc_ave); $i++){printf("★");} ?></td>
													<td></td>
												</tr>
												<tr>
													<th style="vertical-align:middle; text-align:right; padding:0.75em 0.75em 0.75em 0.75em;">데시벨</th>
													<td class="star"><span style="color:#ffdf00;"><?php 
													for($i=0; $i<floor($bulk_ave); $i++){printf("★");} ?></span><?php //별찍기
													for($i=0; $i<5-floor($bulk_ave); $i++){printf("★");} ?></td>
													<td></td>
												</tr>
												<tr>
													<th style="vertical-align:middle; text-align:right; padding:0.75em 0.75em 0.75em 0.75em;">속도</th>
													<td class="star"><span style="color:#ffdf00;"><?php 
													for($i=0; $i<floor($speed_ave); $i++){printf("★");} ?></span><?php //별찍기
													for($i=0; $i<5-floor($speed_ave); $i++){printf("★");} ?></td>
													<td></td>
												</tr>
												<tr>
													<th style="vertical-align:middle; text-align:right; padding:0.75em 0.75em 0.75em 0.75em;">음색</th><a name="comment_link"></a>
													<td class="star"><span style="color:#ffdf00;"><?php 
													for($i=0; $i<floor($tone_ave); $i++){printf("★");} ?></span><?php //별찍기
													for($i=0; $i<5-floor($tone_ave); $i++){printf("★");} ?></td>
													<td></td>
												</tr>
											</tbody>
										</table>
									</div>
									

								</div>

								<?php
									$sql3 = "SELECT Audio_file_address FROM Total_Audio_Contents WHERE Nick_Name='$user_id' AND Chart_id='$chart_id' AND Category='$category_id'";
									$result3 = mysqli_query($link, $sql3);
									$row3 =  mysqli_fetch_array($result3);
									$audio_file = $row3['Audio_file_address'];
								?>
									
								<div style="margin-left:auto; margin-right:auto; text-align:center; width: 120px; margin-top:-100px;" >
									<audio id="a1"><source src="<?php echo $audio_file; ?>" type="audio/mpeg"/></audio><img id="1" onclick="audio_play_pause(this.id)" style="width:50px;" src="../images/play6.png" >									
									<audio id="a1"><source src="<?php echo $audio_file; ?>" type="audio/mpeg"/></audio><img id="1" onclick="stop(this.id)" style="width:50px;" src="../images/stop6.png" >
								</div>

								<hr style="margin:0 0 40px 0; width:1080px; border:solid 1px black;">


								<?php
									$sql4 = "select ID,comment, pronunciation, vocalization, voice_bulk, voice_speed, voice_tone, day, Audio_file_address from te_comment where user_id='$user_id' AND chart_id='$chart_id' AND category_id='$category_id'";
									$result4 = mysqli_query($link,$sql4);
									$row4 = mysqli_fetch_array($result4);
									$pronunciation = $row4['pronunciation'];
									$vocalization = $row4['vocalization'];
									$voice_bulk = $row4['voice_bulk'];
									$voice_speed = $row4['voice_speed'];
									$voice_tone = $row4['voice_tone'];
									$te_id = $row4['ID'];
									$te_add = $row4['Audio_file_address'];

									$sql5 = "select Name from User where ID='$te_id'";
									$result5 = mysqli_query($link,$sql5);
									$row5 = mysqli_fetch_array($result5);

									$count2 = mysqli_num_rows($result4);
									if($count2 < 1) {//전문가 등록이 안되어있다.
								?>










								<?php
									}else {//전문가 등록이 되어있다.
								?>

									<div style="display: flex;">
										<div class="example" style="padding: 6% 5% 5%; border: 1px solid #ccc; text-align:left; width:50%; float:left; border-right:hidden;">
											<h4 style="text-align:left;">전문가 평가</h4>
										
											<br>
											<p style="text-align:left;"><?php echo $row5['Name']; ?>&nbsp;선생님</p>
											<br>
											<p style="text-align:left;"><?php echo $row4['comment']; ?></p>
											<br>
											<div>
												<audio id="a2"><source src="<?php echo $te_add; ?>" type="audio/mpeg"/></audio><img id="2" onclick="audio_play_pause(this.id)" style="width:50px;" src="../images/play6.png" >									
												<audio id="a2"><source src="<?php echo $te_add; ?>" type="audio/mpeg"/></audio><img id="2" onclick="stop(this.id)" style="width:50px;" src="../images/stop6.png" >
											</div>
										</div>

										<div class="example" style="padding: 6% 5% 5%; border: 1px solid #ccc; text-align:left; width:50%; float:right; border-left:hidden;">
											
											<table style="width:400px;">
												<tbody >
													<tr>
														<th style="vertical-align:middle; text-align:right; padding:0.75em 0.75em 0.75em 0.75em;">발성</th>
														<td class="star"><span  style="color:#ffdf00;"><?php for($i=0; $i<floor($vocalization); $i++){printf("★");} ?></span><?php for($i=0; $i<5-floor($vocalization); $i++){printf("★");} ?></td>
														<td></td>
													</tr>
													<tr>
														<th style="vertical-align:middle; text-align:right; padding:0.75em 0.75em 0.75em 0.75em;">발음</th>
														<td class="star"><span  style="color:#ffdf00;"><?php 
														for($i=0; $i<floor($pronunciation); $i++){printf("★");} ?></span><?php //별찍기
														for($i=0; $i<5-floor($pronunciation); $i++){printf("★");} ?></td>
														<td></td>
													</tr>
													<tr>
														<th style="vertical-align:middle; text-align:right; padding:0.75em 0.75em 0.75em 0.75em;">데시벨</th>
														<td class="star"><span style="color:#ffdf00;"><?php 
														for($i=0; $i<floor($voice_bulk); $i++){printf("★");} ?></span><?php //별찍기
														for($i=0; $i<5-floor($voice_bulk); $i++){printf("★");} ?></td>
														<td></td>
													</tr>
												<tr>
														<th style="vertical-align:middle; text-align:right; padding:0.75em 0.75em 0.75em 0.75em;">속도</th>
														<td class="star"><span style="color:#ffdf00;"><?php 
														for($i=0; $i<floor($voice_speed); $i++){printf("★");} ?></span><?php //별찍기
														for($i=0; $i<5-floor($voice_speed); $i++){printf("★");} ?></td>
														<td></td>
													</tr>
													<tr>
														<th style="vertical-align:middle; text-align:right; padding:0.75em 0.75em 0.75em 0.75em;">음색</th><a name="comment_link"></a>
														<td class="star"><span style="color:#ffdf00;"><?php 
														for($i=0; $i<floor($voice_tone); $i++){printf("★");} ?></span><?php //별찍기
														for($i=0; $i<5-floor($voice_tone); $i++){printf("★");} ?></td>
														<td></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>

								<hr style="margin:40px 0 40px 0; width:1080px; border:solid 1px black;">
								<?php
									}
								?>

								
								<aside id="comment1" style="width:800px; margin-left:auto; margin-right:auto;">
									<h4>평가 및 코멘트 등록</h4>

									<form action="graph_point_update.php" onsubmit="" method="post" autocomplete="off" class="comment1">
										<textarea required title="댓글 내용" name="wr_content" placeholder="댓글 내용을 입력해주세요"></textarea>
										<div class="comment2">
											<div class="comment3">
												<div class="comment4">
													<table>
														<tbody>
															<tr>
																<th style="vertical-align:middle; text-align:right; padding:0.75em 0.75em 0.75em 0.75em;">발성</th>
																<td class="star">
																
																	<span class="star-input">
																		<span class="input">
																			<input type="radio" name="star-input" value="1" id="p1">
																			<label style="height:0;" for="p1">1</label>
																			<input type="radio" name="star-input" value="2" id="p2">
																			<label style="height:0;" for="p2">2</label>
																			<input type="radio" name="star-input" value="3" id="p3">
																			<label style="height:0;" for="p3">3</label>
																			<input type="radio" name="star-input" value="4" id="p4">
																			<label style="height:0;" for="p4">4</label>
																			<input type="radio" name="star-input" value="5" id="p5">
																			<label style="height:0;" for="p5">5</label>
																		</span>
																		<output for="star-input"><b>0</b>점</output>						
																	</span>
																
																</td>
																
															</tr>
															<tr>
																<th style="vertical-align:middle; text-align:right; padding:0.75em 0.75em 0.75em 0.75em;">발음</th>
																<td class="star">
																	<span class="star-input2">
																		<span class="input2">
																			<input type="radio" name="star-input2" value="1" id="p6">
																			<label for="p6">1</label>
																			<input type="radio" name="star-input2" value="2" id="p7">
																			<label for="p7">2</label>
																			<input type="radio" name="star-input2" value="3" id="p8">
																			<label for="p8">3</label>
																			<input type="radio" name="star-input2" value="4" id="p9">
																			<label for="p9">4</label>
																			<input type="radio" name="star-input2" value="5" id="p10">
																			<label for="p10">5</label>
																		</span>
																		<output for="star-input2"><b>0</b>점</output>						
																	</span>
																</td>
																
															</tr>
															<tr>
																<th style="vertical-align:middle; text-align:right; padding:0.75em 0.75em 0.75em 0.75em;">데시벨</th>
																<td class="star">
																	<span class="star-input3">
																		<span class="input3">
																			<input type="radio" name="star-input3" value="1" id="p11">
																			<label for="p11">1</label>
																			<input type="radio" name="star-input3" value="2" id="p12">
																			<label for="p12">2</label>
																			<input type="radio" name="star-input3" value="3" id="p13">
																			<label for="p13">3</label>
																			<input type="radio" name="star-input3" value="4" id="p14">
																			<label for="p14">4</label>
																			<input type="radio" name="star-input3" value="5" id="p15">
																			<label for="p15">5</label>
																		</span>
																		<output for="star-input3"><b>0</b>점</output>						
																	</span>
																</td>
																
															</tr>
															<tr>
																<th style="vertical-align:middle; text-align:right; padding:0.75em 0.75em 0.75em 0.75em;">속도</th>
																<td class="star">
																	<span class="star-input4">
																		<span class="input4">
																			<input type="radio" name="star-input4" value="1" id="p16">
																			<label for="p16">1</label>
																			<input type="radio" name="star-input4" value="2" id="p17">
																			<label for="p17">2</label>
																			<input type="radio" name="star-input4" value="3" id="p18">
																			<label for="p18">3</label>
																			<input type="radio" name="star-input4" value="4" id="p19">
																			<label for="p19">4</label>
																			<input type="radio" name="star-input4" value="5" id="p20">
																			<label for="p20">5</label>
																		</span>
																		<output for="star-input4"><b>0</b>점</output>						
																	</span>
																</td>
																
															</tr>
															<tr>
															
																<th style="vertical-align:middle; text-align:right; width:250px; padding:0.75em 0.75em 0.75em 0.75em;">음색</th>
																
																<td class="star">
																	<span class="star-input5">
																		<span class="input5">
																			<input type="radio" name="star-input5" value="1" id="p21">
																			<label for="p21">1</label>
																			<input type="radio" name="star-input5" value="2" id="p22">
																			<label for="p22">2</label>
																			<input type="radio" name="star-input5" value="3" id="p23">
																			<label for="p23">3</label>
																			<input type="radio" name="star-input5" value="4" id="p24">
																			<label for="p24">4</label>
																			<input type="radio" name="star-input5" value="5" id="p25">
																			<label for="p25">5</label>
																		</span>
																		<output for="star-input5"><b>0</b>점</output>						
																	</span>
																</td>
																
																
															</tr>
														</tbody>
													</table>
												</div>
											</div>

											<div class="comment5" style="margin-left:auto; margin-right:auto; text-align:right;">
												
												<input type="submit" value="평가 등록" >
											</div>
										</div>
									</form>
								</aside>
								<hr style="margin:0 0 40px 0; width:800px; border:solid 1px gray; margin-right:auto; margin-left:auto;">
<script src="../assets/js/jquery-1.11.3.min.js"></script>
<script src="../assets/js/star.js"></script>
<script src="../assets/js/star2.js"></script>
<script src="../assets/js/star3.js"></script>
<script src="../assets/js/star4.js"></script>
<script src="../assets/js/star5.js"></script>

<div class="my_comment"  style="width:800px; margin-left:auto; margin-right:auto;">
				<h3 class="type2" style="text-align:center;"> 코멘트 </h3>
			<!--	<div class="mb_info block">
					<img src="../img/chart_img_1.jpg" /><span class="name">voice0214</span><span class="date">2018-09-30 &nbsp; 20분</span>
				</div> -->
				
				<ul class="cm_list block">
				
				<?php
			
				//$chart_id=trim($_SESSION['chart_id']);
 				//$user_id=trim($_SESSION['user_id']);

  // 데이터 베이스 연결.
  
  					mysqli_set_charset($link, "utf8"); //한국어 인코딩 코드
   					$select_query1 = "select ID, Seen,user_id,comment,pronunciation, vocalization, voice_bulk, voice_speed, voice_tone, day from User_comment where user_id='$user_id' AND chart_id='$chart_id' AND category_id='$category_id'"; 

					 $result_set = mysqli_query($link, $select_query1);
					 $getid = $_SESSION["id"];//현재 사용자(게시글을 보고있는 사용자)


   					while ($row1 = mysqli_fetch_array($result_set)){
						$temp=$row1["user_id"];//이 게시글의 작성자
 					?>
 					
					<li style="height:250px;">
						<?php if(($getid==$row1["user_id"]) and ($row1["Seen"]==1) and !($getid==$row1["ID"])){?> 
						<div style="float:right; font-size: 13px;"> &nbsp신규</div> 
						<?php
								}
							  ?>
						<div class="comment_name"><?php printf($row1["ID"]); ?></div>	
						<div style="text-align:right;  margin-top:-25px;"><font style=" font-family: 'NanumSquareR'; color: black; font-size: 13px;"><?php echo $row1["day"]; ?></font></div>
						<div class="comment_cons">
							<div class="star" style="float:right;" >
							
								<span style="color:#ffdf00;"><?php 
								$pro=$row1["pronunciation"];
								for($i=0; $i<$pro; $i++){printf("★");} ?></span><?php //별찍기
								$pro=$row1["pronunciation"];
								for($i=0; $i<5-$pro; $i++){printf("★");} ?><br>
								<span style="color:#ffdf00;"><?php 
								$pro=$row1["vocalization"];
								for($i=0; $i<$pro; $i++){printf("★");} ?></span><?php //별찍기
								$pro=$row1["vocalization"];
								for($i=0; $i<5-$pro; $i++){printf("★");} ?><br>
								<span style="color:#ffdf00;"><?php 
								$pro=$row1["voice_bulk"];
								for($i=0; $i<$pro; $i++){printf("★");} ?></span><?php //별찍기
								$pro=$row1["voice_bulk"];
								for($i=0; $i<5-$pro; $i++){printf("★");} ?><br>
								<span style="color:#ffdf00;"><?php 
								$pro=$row1["voice_speed"];
								for($i=0; $i<$pro; $i++){printf("★");} ?></span><?php //별찍기
								$pro=$row1["voice_speed"];
								for($i=0; $i<5-$pro; $i++){printf("★");} ?><br>
								<span style="color:#ffdf00;"><?php 
								$pro=$row1["voice_tone"];
								for($i=0; $i<$pro; $i++){printf("★");} ?></span><?php //별찍기
								$pro=$row1["voice_tone"];
								for($i=0; $i<5-$pro; $i++){printf("★");} ?><br>
							
							</div>
							<p ><?php printf($row1["comment"]); ?></p>
						</div>
						
					</li>
					<hr style="margin: 0;">
					<?php }

				if($getid==$temp){//글의 작성자와 게시글을 보고있는 사람이 같으면
					$sqlquery = "UPDATE User_comment SET Seen = '0' WHERE user_id='$user_id' AND chart_id='$chart_id' AND category_id='$category_id' AND Seen='1'";//알림 댓글을 봤다!
					$result1=mysqli_query($link,$sqlquery);//Seen = 0으로 업뎃
				}

    			mysqli_close($link);
   				?>
				</ul>
				<!-- 페이지이동 -->
				<!--<ul class="pages">
					<li><a href="" class="btn_prev btn" title="이전글"></a></li>
					<li>
						<div><a href="" class="btn_b01 btn"><strong>1</strong></a><a href="" class="btn_b01 btn">2</a><a href="" class="btn_b01 btn">3</a><a href="" class="btn_b01 btn">4</a><a href="" class="btn_b01 btn">5</a></div>
					</li>
					<li><a href="" class="btn_next btn" title="다음글"></a></li>					
				</ul>-->
				<!--// 페이지이동 -->
			</div>
			<!--// 댓글 리스트 -->

			

</div>








					<!-- 끝 -->

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


			<script>
				var ctx = document.getElementById('myChart').getContext('2d');
				var chart = new Chart(ctx, {
					type: 'radar',
					data: {
    					labels: ['발성', '발음', '데시벨', '속도', '음색'],
						datasets: [{
							label: '평가지표군',
  	      					data: [<?php echo floor($pro_ave); ?>, <?php echo floor($voc_ave); ?>,<?php  echo floor($bulk_ave); ?>, <?php echo floor($speed_ave); ?>,<?php echo floor($tone_ave); ?>],
							backgroundColor: [
                				'rgba(255, 223, 0, 0.8)',
							],
           					borderColor: [
								'rgba(255, 223, 0, 0.8)',
								'rgba(255, 145, 0, 1)',
								'rgba(54, 162, 235, 1)',
								'rgba(255, 206, 86, 1)',
								'rgba(75, 192, 192, 1)',
								'rgba(153, 102, 255, 1)',
                			],
							pointBackgroundColor: [ 
								'rgba(255, 223, 0, 1)', //노랑
								'rgba(255, 223, 0, 1)', //노랑
								'rgba(255, 223, 0, 1)', //노랑
								'rgba(255, 223, 0, 1)', //노랑
								'rgba(255, 223, 0, 1)', 
							],
							pointBorderColor:[  //점 경계 컬러 각 항목마다 색상 설정가능 , 점 경계 채우기
								'rgba(255, 223, 0, 1)', //노랑
								'rgba(255, 223, 0, 1)', //노랑
								'rgba(255, 223, 0, 1)', //노랑
								'rgba(255, 223, 0, 1)', //노랑
								'rgba(255, 223, 0, 1)', //노랑
							],
						}]
					},
					options:{
						scale:{
							ticks:{
								display:false,
								begininAtZero:true,
								min:0,
								max:5,
								maxTicksLimit:5
							},
							angleLines:{
								color:'#999',
							},
							gridLines:{
								color:'#999',
							},
							pointLabels:{
								fontSize:12.5,
								fontColor:"black"
							},
						},
						legend:{
							display:false
						}
					}
				});


			
				function audio_play_pause(id)
				{
					var myAudio=document.getElementById("a"+id);

					var img_play_pause = document.getElementById(id);

					if(myAudio.paused){
						myAudio.play();
						img_play_pause.src="../images/pause6.png"
					}else{
						myAudio.pause();
						img_play_pause.src="../images/play6.png"
					}
				}

				function stop(id)
				{
					var myAudio=document.getElementById("a"+id);
					var check_img_id= document.getElementById(id);

					myAudio.pause();
					myAudio.currentTime=0;
					check_img_id.src="../images/play6.png";
				}


			</script>
							

			









	</body>
</html>