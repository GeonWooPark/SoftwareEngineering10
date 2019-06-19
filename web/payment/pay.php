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
				<div class="container">
					<header class="major special">
						<h2>PAYMENT</h2>
						<p>결제하여 다양한 컨텐츠를 즐겨보세요!</p>
					</header>
					<hr>
					
					<section id="part1">
						<ul style="list-style:none; padding-left:0px;">
							<li style="padding-left:0px;">
								<strong><h1 style="text-align:center;">모든 스피치 강의 무제한 수강 !</h1></strong>
								<br>
								<strong><p style="font-size: 45px; color:red; text-align:center;">월 5,000원</p></strong>
							</li>
															
						</ul>
					</section>
					<hr>

					<section id="part2">
						<header>
							<h3 style="text-align:center;  padding-bottom:50px;">수강 시 제공되는 서비스</h3>
						</header>
						<ul style="list-style:none; padding-left:0px; text-align:center;">
							<li style="padding-left:0px;">
								<strong>1. 모든 강의 무제한 수강</strong>
								<br>
								<p>한번 결제로 모든 강의와 업데이트 되는 강의를<br><br>무제한으로 이용하실 수 있습니다.<br><br>다양한 스피치 강의를 효율적으로 이용해 보세요!</p>
							</li>
							<li style="padding-left:0px;">
								<strong>2. 무한 1:1 피드백 서비스</strong>
								<br>
								<p>강사님들에게 스피치 피드백 요청 시 실시간으로<br><br>음성 및 텍스트 답변을 받을 수 있습니다.</p>
							</li>
							<li style="padding-left:0px;">
								<strong>3. 전문적인 분석 서비스</strong><br>
								<p>수강생의 스피치 스타일을 파악하여 보이스유 전문가들이<br><br> 맞춤형 분석을 진행합니다.<br><br> 자신의 스타일에 맞는 스피치를 분석해 <br><br>보다 확실한 성장을 기대하실 수 있습니다</p>
							</li>
						</ul>
					</section>
					<hr>
					<div>
						<p style="text-align:center;"><button type="button" onclick="requestPay()" ><strong style="color:white;">결제 하기</strong></button></p>
					</div>
					
					

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
				function requestPay() {
					// IMP.request_pay(param, callback) 호출
					var IMP = window.IMP; // 생략가능
					IMP.init('imp82670246');  // 가맹점 식별 코드
					IMP.request_pay({ // param
						pg: 'danal_tpay', //다날 참고함
						pay_method: 'card',
						merchant_uid : 'merchant_' + new Date().getTime(), //상점에서 관리하시는 고유 주문번호를 전달
						name: '스피치 강의 무제한 수강권',
						amount: 1000,
						buyer_email: 'gildong@gmail.com',
						buyer_name: '홍길동',
						buyer_tel: "010-4242-4242",
						buyer_addr: "서울특별시 강남구 신사동",
						buyer_postcode: "01181"
					}, function (rsp) { // callback
						if (rsp.success) {
							//var msg = '결제가 완료되었습니다.';
						//msg += '고유ID : ' + rsp.imp_uid;
						//msg += '상점 거래ID : ' + rsp.merchant_uid;
						//msg += '결제 금액 : ' + rsp.paid_amount;
						//msg += '카드 승인번호 : ' + rsp.apply_num;

						location.href="pay_check.php";

						} else {
							var msg = '결제에 실패하였습니다.';
						msg += '에러내용 : ' + rsp.error_msg;
						}
						alert(msg);
					});
				}
			</script>
			<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
			<script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>
			<script type="text/javascript" src="https://service.iamport.kr/js/iamport.payment-1.1.2.js"></script>





	</body>
</html>