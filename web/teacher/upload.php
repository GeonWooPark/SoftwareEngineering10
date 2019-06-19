<?php session_start();
	include 'db.php';
	$link = connect_db($host,$dbid,$dbpw,$dbname);
	mysqli_set_charset($link,"utf8");
?>



<!DOCTYPE html>
<html lang="ko">
<head>
	<title>VOICE YOU</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/css/main.css">
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



	
	<div class="limiter" style="height: 980px;">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90" style="width:800px;">

				
				<form class="login100-form validate-form flex-sb flex-w" action="lecture_transfer.php" method="POST" enctype="multipart/form-data">
					<span class="login100-form-title p-b-51">
						강의 영상 업로드
					</span>
					<p>
					강의 영상 파일을 업로드하는 공간입니다.<br>
					업로드를 하면 사용자들이 결제를 한 후 영상을 볼 수 있습니다.<br>
					업로드 할 때의 강의 제목을 입력하고, 영상 파일을 선택한 후 업로드 버튼을 누르면 완료됩니다.
					</p>
					<hr style="margin:0 0 40px 0; width:800px; border:solid 1px gray; margin-right:auto; margin-left:auto;">

					<!--
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="ID">
						<span class="focus-input100"></span>
					</div>
					-->
					
					
					<p style="margin:0px;">
					강의 제목
					</p>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter your message">
						<textarea class="input100" name="title" placeholder="Your Message"></textarea>
						<span class="focus-input100"></span>
					</div>

					<p style="margin:0px;">
					강의 카테고리
					</p>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter your message">
						<textarea class="input100" name="category" placeholder="Your Message"></textarea>
						<span class="focus-input100"></span>
					</div>


					<p style="margin:0px;">
					강의 소개 내용
					</p>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter your message" style="height:100px;">
						<textarea class="input100" name="contents" placeholder="Your Message" style="height:98px;"></textarea>
						<span class="focus-input100"></span>
					</div>


					<div class="bo_w_flie write_div" style="margin: 5px 0; position:relative; width:800px;">
								<div class="file_wr write_div" style="border: 1px solid #ccc; background: #fff; color: #000; vertical-align:middle; border-radius: 3px; padding:5px; height:50px; margin:0; positon:relative;">

									
									<input type="file" name="v_uploaded_file" id="fileToUpload" class="frm_file" style=" width: 100%; margin-bottom:5px; display:block;">
								</div>
								
							</div>

					<div class="container-login100-form-btn m-t-17" style="text-align:center; margin-left:auto; margin-right:auto; text-align:right;">
						<input type="submit" class="login100-form-btn" value="업로드" style="color:#3A1D1D !important; background-color: #ffdf00; width:200px; text-align:center; margin-left:auto; margin-right:auto;">
					
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>









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





	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<!-- Scripts -->
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/skel.min.js"></script>
	<script src="../assets/js/util.js"></script>
	<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
	<script src="../assets/js/main.js"></script>

</body>
</html>