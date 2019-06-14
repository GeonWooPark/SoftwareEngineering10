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
							
		
						$flag = 1;
						$count = 0;
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
					<li><a href="#" style="text-transform: none;"><img src="../images/person.jpg" style="width: auto; height:20px;">&nbsp;<?php echo $_SESSION["id"];?></a></li>
					<li><a href="../index.php">Home</a></li>
					<li><a href="../logout/logout.php">Logout</a></li>
					<li><a href="../upload/upload.php">Upload</a></li>
					<li><a href="../chart/chart.php">Chart</a></li>
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
						<h2>NOTIFICATION</h2>
						<p>알림 페이지 입니다.<br>알림을 클릭하면 해당 페이지로 이동합니다.</p>
					</header>
					<hr>
					
					
					<!-- Table -->
						<section>
							<h3>알림 목록</h3>
						
							<div class="table-wrapper">
								<table>
									<colgroup>
										<col width="5%" />
										<col width="10%" />
										<col width="40%" />
										<col width="15%" />

									</colgroup>
									<thead>
										<tr>
											<th>번호</th>
											<th>분류</th>
											<th>작성자</th>
											<th>day</th>
										</tr>
									</thead>
									<tbody>

										<?php 
											$getid = $_SESSION['id'];
											$select_query1 = "SELECT ID, Seen, day, chart_id, category_id FROM User_comment where user_id='$getid'"; 
											$result_set1 = mysqli_query($link, $select_query1);
											
											$tx_count = 0;
   										
											$tx_array = array();
											$flag = 1;
											$count = 0;
						
										   
										   
											while ($row1 = mysqli_fetch_assoc($result_set1)) {
												if($row1["Seen"]==$flag and !($getid == $row1["ID"])) {
													$tx_array[$tx_count] = (string)$tx_count;
													
													
												
										?>

										<tr>
											<td>
												<?php echo $tx_array[$tx_count]+1;?>
											</td>
											<td>
												<?php printf($row1["category_id"]);?>
											</td>
											<td style="text-align: left;">
												<a href="../chart/grade.php?<?php printf($row1["category_id"]); ?>?<?php printf($row1["chart_id"]); ?>?<?php printf($getid);?>" style="text-decoration:none;">
													<strong><?php printf($row1["ID"]."님이 회원님의 목소리에 평가하였습니다.");?></strong>
												</a>
											</td>
											<td>
												<span><?php printf($row1["day"]);?></span>
											</td>
											
											
										</tr>
										
										<?php $tx_count++;?>
										

										<?php
												}
											}
										?>
										
										<?php mysqli_close($link);?>
										
										
										
									</tbody>
									<tfoot>
										<tr>
											
										</tr>
									</tfoot>
								</table>
							</div>
							
						</section>

					

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
				function audio_play_pause(id)
				{
					var myAudio = document.getElementById("a"+id);
					var img_play_pause = document.getElementById(id);

					var total_count = "<?php echo $audio_count;?>";
					var click_flag = "click_flag";

					for(var i=0; i<total_count; i++) {
						var check_audio_id = document.getElementById("a"+i);
						var check_img_id = document.getElementById(i);

						if(check_audio_id.paused) {
							continue;
						}else {
							check_audio_id.pause();
							check_img_id.src = "../images/play6.png"
							click_flag = "a"+i;
						}
					}

					if(myAudio.paused && click_flag != "a"+id) {
						myAudio.play();
						img_play_pause.src="../images/pause6.png"
					}else {
						myAudio.pause();
						img_play_pause.src="../images/play6.png"
					}
				}
			</script>

			<script>
				function stop(id)
				{
					var myAudio = document.getElementById("a"+id);
					var check_img_id = document.getElementById(id);

					myAudio.pause();
					myAudio.currentTime = 0;
					check_img_id.src = "../images/play6.png";
				}
			</script>





	</body>
</html>