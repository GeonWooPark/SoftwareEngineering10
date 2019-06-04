<?php session_start();?>
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
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt">
				<h1><a href="index.php">VOICE YOU</a></h1>
				<?php
					if(isset($_SESSION["id"])) {
						include 'db.php';
						//echo "<script>alert('smooth1')</script>";
						$link = connect_db($host, $dbid, $dbpw, $dbname);
						$getid= $_SESSION['id'];
						mysqli_set_charset($link, "utf8");
						$select_query = "select ID, Seen from User_comment where user_id='$getid'"; 
						$select_queryt = "select teacher, pass from User where ID='$getid'";
						$result_set = mysqli_query($link, $select_query);
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
					<li><a href="index.php">Home</a></li>
					<li><a href="login/login.html">Login</a></li>
					<li><a href="join/join.php">Join</a></li>
					<li><a href="upload/upload.php">Upload</a></li>
					<li><a href="chart/chart.php">Chart</a></li>					
				</ul>
			</nav>
			<?php }else { ?> <!--로그인 o-->
			<nav id="nav">
				<ul class="links">

					<?php 
						if($rowt["teacher"]==$flag) { //선생님
					?>
					<li><a href="#" style="text-transform: none;"><img src="images/person.jpg" style="width: auto; height:20px;">&nbsp;<?php echo $_SESSION["wh"];?>&nbsp;teacher</a></li>
					<?php
						}else if($rowt["pass"]==$flag){ //사용자
					?>
					<li><a href="#" style="text-transform: none;"><img src="images/person.jpg" style="width: auto; height:20px;">&nbsp;<?php echo $_SESSION["wh"];?>&nbsp;student</a></li>
					<?php
						}else {
					?>
					<li><a href="#" style="text-transform: none;"><img src="images/person.jpg" style="width: auto; height:20px;">&nbsp;<?php echo $_SESSION["wh"];?>&nbsp;</a></li>
					<?php
						}
					?>
					
					<li><a href="index.php">Home</a></li>
					<li><a href="logout/logout.php">Logout</a></li>
					<li><a href="upload/upload.php">Upload</a></li>
					<li><a href="chart/chart.php">Chart</a></li>
					


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
						if($count == 0) { //알림 x
					?>
					<li><a href="#"><img src="images/notification1.png" alt="알림" style="width: auto; height: 1.25em; vertical-align:middle;" >&nbsp;Notification</a><li>
					<?php
						}else { //알림 o
					?>
					<li><a href="notification/notification.php"><?php echo $count; ?><img src="images/notification2.png" alt="알림" style="width: auto; height: 1.25em; vertical-align:middle;" >&nbsp;Notification</a><li>
					<?php
						}
					?>


					
					
					

				</ul>
			</nav>
			<?php } ?>

		<!-- Banner -->
			<section id="banner">
				<i class="icon fa-microphone"></i>
				<h2>VOICE YOU</h2>
				<p>우리는 말합니다. 우리는 듣습니다. 우리는 배웁니다.  <br><br>VOICE YOU에서 즐겨봅시다!</p>
				<ul class="actions">
					<li><a href="broadcast/index.html" class="button big special" style="background-color:#ffdf00">Learn More</a></li>
				</ul>
			</section>

		<!-- One -->
			<section id="one" class="wrapper style1">
				<div class="inner">
					<article class="feature left" style="background-color:#ffdf00">
						<span class="image"><img src="images/pic01.jpg" alt="" /></span>
						<div class="content" >
							<h2>VOICE 평가 시스템</h2>
							<p>VOICE YOU에서 평가를 받아보세요!</p>
							<ul class="actions">
								<li>
									<a href="#" class="button alt">More</a>
								</li>
							</ul>
						</div>
					</article>
					<article class="feature right" style="background-color:#ffdf00">
						<span class="image"><img src="images/pic02.jpg" alt="" /></span>
						<div class="content">
							<h2>수익 창출 하기</h2>
							<p>VOICE YOU에서 전문가가 되어 수익을 창출하세요!</p>
							<ul class="actions">
								<li>
									<a href="#" class="button alt">More</a>
								</li>
							</ul>
						</div>
					</article>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper special">
				<div class="inner">
					<header class="major narrow">
						<h2>VOICE YOU</h2>
						<p>당신의 말하기를 성장 시키세요.<br>현재 나의 목소리를 분석하고 개선하는 서비스<br>+<br>당신을 성장 시키세요.<br>당신이 원하는 모든 것을 1:1로 배울 수 있는 서비스입니다.</p>
					</header>
					<div class="image-grid">
						<li class="image"><img src="images/two1.png" alt="" /></li>
						<li class="image"><img src="images/two2.png" alt="" /></li>
						<li class="image"><img src="images/two4.png" alt="" /></li>
						<li class="image"><img src="images/two3.png" alt="" /></li>
						
					</div>
					<ul class="actions">
						<li><a href="#" class="button big alt">MORE</a></li>
					</ul>
				</div>
			</section>

		<!-- Three -->
			<section id="three" class="wrapper style3 special">
				<div class="inner">
					<header class="major narrow	">
						<h2>VOICE academy</h2>
						<p>보이스 아카데미 수업을 들어보세요!</p>
					</header>
					<ul class="actions">
						<?php if(!isset($_SESSION["id"])) { ?> <!--로그인 x -->
						<li><p>결제를 하려면 로그인을 먼저해야 합니다.</p><a href="login/login.html" class="button big alt" >로그인</a></li>
						<?php
						}else if($rowt["pass"]==$flag){ 
						?> <!-- 로그인 o 결제한 사람 -->
						<li><a href="#" class="button big alt" >강의 들으러 가기</a></li>
						<?php
						}else {
						?> <!-- 로그인 o 결제 안 한 사람 -->
						<li><a href="payment/pay.php" class="button big alt" >결제 하러 가기</a></li>
						<?php
						}
						?>
					</ul>
				</div>

				

					<!-- -->
					<div id="page" class="container">
						<div class="title">
							<h2>VOICE LECTURE</h2>
						</div>
						
						<div class="boxA">
							<div class="box1">
								<img src="images/teach1.jpg" width="320" height="180" alt="" />
								<h3>김희철 선생님</h3>
								<p>희 쌤과 함께하는 게임 과외! <br>(1개월 과정)</p>
								<a href="lecture/user_dashboard.php?test" class="button">Read More</a>
							</div>
							<div class="box1">
								<img src="images/teach4.jpg" width="320" height="180" alt="" />
								<h3>강민경 선생님</h3>
								<p>다비치 강민경이 가르쳐주는 보컬 강좌 <br>(6개월 완성)</p>
								<a href="#" class="button">Read More</a>
							</div>
						</div>
						<div class="boxB">
							<div class="box1">
								<img src="images/teach2.jpg" width="320" height="180" alt="" />
								<h3>서강준 선생님</h3>
								<p>서강준 쌤의 있어보이게 연기하는 법! <br>(1개월 과정)</p>
								<a href="#" class="button">Read More</a>
							</div>
							<div class="box1">
								<img src="images/teach6.jpg" width="320" height="180" alt="" />
								<h3>이병헌 선생님</h3>
								<p>광고 찍을 때는 항상 이런 목소리로! <br>(2주 과정)</p>
								<a href="#" class="button">Read More</a>
							</div>
						</div>
						<div class="boxC">
							<div class="box1">
								<img src="images/teach3.jpg" width="320" height="180" alt="" />
								<h3>강동원 선생님</h3>
								<p>대한민국 최고의 비율 강동원이 알려주는 <br>모델처럼 걷는 법! (2개월 과정)</p>
								<a href="#" class="button">Read More</a>
							</div>
							<div class="box1">
								<img src="images/teach5.jpg" width="320" height="180" alt="" />
								<h3>한예슬 선생님</h3>
								<p>이것만 보면 메이크업은 마스터! <br>2030 화장법의 모든 것! (3주 과정)</p>
								<a href="#" class="button">Read More</a>
							</div>
						</div>
					</div>
					<!-- -->
				
			</section>

		<!-- Four -->
		<!--
			<section id="four" class="wrapper style2 special">
				<div class="inner">
					<header class="major narrow">
						<h2>Get in touch</h2>
						<p>Q&A</p>
					</header>
					<form action="#" method="POST">
						<div class="container 75%">
							<div class="row uniform 50%">
								<div class="6u 12u$(xsmall)">
									<input name="name" placeholder="Name" type="text" />
								</div>
								<div class="6u$ 12u$(xsmall)">
									<input name="email" placeholder="Email" type="email" />
								</div>
								<div class="12u$">
									<textarea name="message" placeholder="Message" rows="4"></textarea>
								</div>
							</div>
						</div>
						<ul class="actions">
							<li><input type="submit" class="special" value="Submit" /></li>
							<li><input type="reset" class="alt" value="Reset" /></li>
						</ul>
					</form>
				</div>
			</section>
		-->
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
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>


	</body>
</html>