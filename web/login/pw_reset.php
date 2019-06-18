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
	<link rel="stylesheet" type="text/css" href="../assets/css/main.css"
</head>
<body>



	<!-- Header -->
		<header id="header">
			<h1><a href="../index.php">VOICE YOU</a></h1>
			<a href="#nav">Menu</a>
		</header>

	<!-- Nav -->
		<nav id="nav">
			<ul class="links">
				<li><a href="../index.php">Home</a></li>
				<li><a href="login.html">Login</a></li>
				<li><a href="../join/join.php">Join</a></li>
				<li><a href="../upload/upload.php">Upload</a></li>
				<li><a href="../chart/chart.php">Chart</a></li>
			</ul>
		</nav>


	
	<div class="limiter" style="height: 750px;">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">

				
				<form class="login100-form validate-form flex-sb flex-w" action="pw_reset_send.php" method="POST">
					<span class="login100-form-title p-b-51">
						비밀번호 재설정
					</span>

					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="새로운 비밀번호">
						<span class="focus-input100"></span>
					</div>

					<h5>
						영문, 숫자, 특수기호 8자리 이상으로 구성하여야 합니다.
					</h5>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password_check" placeholder="새로운 비밀번호 확인">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Certification Number is required">
						<input class="input100" type="password" name="number" placeholder="이메일 인증번호">
						<span class="focus-input100"></span>
					</div>
					
					<br>
					<br>

					<div class="container-login100-form-btn m-t-17">
						<input type="submit" class="login100-form-btn" value="password reset" style="color:#3A1D1D !important; background-color: #ffdf00">
					
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