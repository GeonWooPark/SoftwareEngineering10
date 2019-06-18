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

		<?php
			
		
			$id = $_SESSION["id"];
			$select_query2 = "SELECT * FROM teacher_intro where id='$id'"; 
			$result_set2 = mysqli_query($link, $select_query2);

			$row2 = mysqli_fetch_array($result_set2);
			
		?>







			<section id="main" class="wrapper">
				<div class="container" style="width:800px;">
					<header class="major special">
						<h2>MY LECTURE</h2>
						<p><?php echo $_SESSION['wh']; ?>님의 강좌 페이지입니다.</p>
					</header>
					<hr>
					

					<div class="example" style="padding: 6% 5% 5%; border: 1px solid #ccc; text-align:center;">
						<?php echo $row2['head1']; ?>
		
						<br>
						<br>
						<?php echo $row2['text1']; ?>
					</div>


					<div class="example" style="padding: 6% 5% 5%; border: 1px solid #ccc; text-align:center;">
						<?php echo $row2['head2']; ?>
		
						<br>
						<br>
						<?php echo $row2['text2']; ?>
					</div>

					<hr>
					<!-- Table -->
						<section>
							<h3>전체 강의</h3>
						
							<div class="table-wrapper">
								<table>
									<colgroup>
										<col width="10%" />
										<col width="15%" />
										<col width="40%" />
										<col width="15%" />
									</colgroup>
									<thead>
										<tr>
											<th>강사</th>
											<th>분류</th>
											<th>제목</th>
											<th>날짜</th>
											
										</tr>
									</thead>
									<tbody>

										<?php 
											$id = $_SESSION["id"];
											$select_query1 = "SELECT * FROM Lecture where id='$id'"; 
											$result_set1 = mysqli_query($link, $select_query1);
											
   															   
										   
											while ($row1 = mysqli_fetch_array($result_set1)) {
																					
										?>

										<tr>
											<td>
												<?php echo  $_SESSION['wh'];;?>
											</td>
											<td>
												<?php printf($row1["category"]);?>
											</td>
											<td style="text-align: center;">
												<a href="lecture.php?<?php printf($row1["category"]);?>?<?php printf($row1["id"]);?>?<?php printf($row1["date"]);?>" style="text-decoration:none;">
													<strong><?php printf($row1["title"]);?></strong>
												</a>
											</td>
											<td>
												<span><?php printf($row1["date"]);?></span>
											</td>
											
											
										</tr>
										
										<?php
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








			

	</body>
</html>