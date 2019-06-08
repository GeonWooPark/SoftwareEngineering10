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
				<li><a href="../login/login.html">Login</a></li>
				<li><a href="join.php">Join</a></li>
				<li><a href="../upload/upload.php">Upload</a></li>
				<li><a href="../chart/chart.php">Chart</a></li>
			</ul>
		</nav>


	
	<div class="limiter" style="height: 1100px;">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">

				
				<form class="login100-form validate-form flex-sb flex-w" action="join_check.php" onsubmit="return tocheckpw2()" method="POST">
					<span class="login100-form-title p-b-51">
						회원가입 2단계
					</span>
					<h4>
						회원가입을 진행합니다.
					</h4>
					
					<!-- 이름-->
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Name is required">
						<input class="input100" type="text" name="name" placeholder="이름">
						<span class="focus-input100"></span>
					</div>
					

					
					<!-- 이메일-->
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Email is required">
						<input class="input100" type="text" name="email" placeholder="이메일">
						<span class="focus-input100"></span>
					</div>
					<h5>
						1단계에서 입력한 이메일을 입력하세요. 비밀번호 찾기 시 사용됩니다. 
					</h5>


					<!-- 이메일 인증번호-->
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Certification Number is required">
						<input class="input100" type="password" name="number" placeholder="이메일 인증 번호">
						<span class="focus-input100"></span>
					</div>

					<!-- 아이디-->
					<div class="wrap-input100 validate-input m-b-16" data-validate = "ID is required">
						<input class="input100" type="text" name="id" placeholder="아이디">
						<span class="focus-input100"></span>
					</div>

					<!-- 비밀번호-->
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="패스워드">
						<span class="focus-input100"></span>
					</div>
					<h5>
						영문, 숫자, 특수기호 8자리 이상으로 구성하여야 합니다.
					</h5>


					<!-- 비밀번호 확인-->
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="pass2" placeholder="패스워드 확인">
						<span class="focus-input100"></span>
					</div>

					
					<!-- 이용약관 동의-->
					<div class="flex-sb-m w-full p-t-3 p-b-24">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" style="width:18px; height: 18px; top: 50%; border: 2px solid #827ffe;">
							<label class="label-checkbox100" for="ckb1" style="margin:0">
								이용약관 및 개인정보 수집 및 활용에 모두 동의합니다.
							</label>
						</div>

					
					</div>

					<!-- 가입하기-->
					<div class="container-login100-form-btn m-t-17">
						<input type="submit" class="login100-form-btn" value="가입하기" style="color:#3A1D1D !important; background-color: #ffdf00">
					
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

	<script type="text/javascript">
    	function tocheckpw2() {
			var pw = document.getElementById("password").value;
			var password = document.getElementById("password");
			var pwck = document.getElementById("password_check").value;
			var pattern1 = /[0-9]/;

			var pattern2 = /[a-zA-Z]/;

			var pattern3 = /[~!@\#$%<>^&*]/;     // 원하는 특수문자 추가 제거

			if (pw != pwck) {
				document.getElementById('pwsame').innerHTML = '비밀번호가 맞지 않습니다.';
				return false;
			}

			if(!pattern1.test(pw)||!pattern2.test(pw)||!pattern3.test(pw)||pw.length<8||pw.length>50){

				alert("영문+숫자+특수기호 8자리 이상으로 구성하여야 합니다.");

				return false;
			}       
		}

</script>

</body>
</html>