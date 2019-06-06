<?php
  session_start();

  session_destroy(); // 세션파괴
  echo ("<script language=javascript> alert('로그아웃 하였습니다.');</script>");
  echo("<meta http-equiv='Refresh' content='0; URL=../index.php'>");

 ?>
