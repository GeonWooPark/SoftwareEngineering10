<?php
$host="answer.cm45obdqk6m1.us-east-1.rds.amazonaws.com";  //자신을 서버로 사용합니다.
$dbid="answer";  // MySQL 아이디
$dbpw="ghdi192837"; // MySQL 비밀번호
$dbname="tmp";  //사용할 데이터베이스 이름

?>
<?php
function connect_db($host, $dbid, $dbpw, $dbname)
{
    return mysqli_connect($host, $dbid, $dbpw, $dbname);
}

function connect_check($connect){
  if(!$connect){
    echo "MySQL 접속 에러 : ";
    echo mysqli_connect_error();
    exit();
  }
}

/*function getUserFileInfo($connect, $email){
  $sql = "select url,filename from userfile where email='$email'";
  return mysqli_query($connect,$sql);
}*/
?>

