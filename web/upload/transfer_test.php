<?php


include 'db.php';
   	require '../../vendor/autoload.php';
//echo "<script>alert(\"<php? printf($chart_id+$category);\");</script>";
use Aws\S3\S3Client; 
use Aws\S3\Exception\S3Exception;

session_start();

$id = $_SESSION['id']; // 세션에 저장되어 있는 id 불러옴
$category=$_SESSION['record_category'];
$chart_id=$_SESSION['record_index'];

$file_Name = basename($_FILES["uploaded_file"]["name"]);
$title = $_POST['title'];
//$script = $_POST['script'];
//echo "<script>alert(\"<php? printf($script);\");</script>";

//$strTok =explode(':' , $script);
//$chart_id=$strTok[0];
//$category=$strTok[2];
   $link = connect_db($host, $dbid, $dbpw, $dbname);
   mysqli_set_charset($link, "utf8");
  
   $sql = "select * from Total_Audio_Contents where Nick_Name='$id' and Chart_id='$chart_id' and Category='$category'";
   $result = mysqli_query($link,$sql);
   $count = mysqli_num_rows($result);

   // COUNT가 1보다 작으면 일치하는 데이터가 없으므로 
   if($count < 1){



$bucket = 'hyeong'; // S3 bucket name
                        
$s3 = new S3Client([
    'version' => 'latest',
    'region'  => 'ap-northeast-2',
    'credentials' => [
    	'key' => 'AKIAYZH42MOABZGB7H6Q', // access key
    	'secret' => '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', // secret key
    ],
]);
//echo "before s3 put!!!";
try {
    // Upload data.
    $result = $s3->putObject([
        'Bucket' => $bucket,
        'Key'    => $_FILES["uploaded_file"]["name"],  //사용자 시스템에 있을 때의 파일 이름
        'SourceFile'   => $_FILES["uploaded_file"]["tmp_name"],//웹서버에 임시로 저장된 파일의 위치
        'ContentType'=>$_FILES['uploaded_file']['type'],  //업로드 파일의 MIME 타입
        'ACL'    => 'public-read' // only read
    ]);

//	chmod($_FILES['uploaded_file']['tmp_name'],0777);
    @unlink($_FILES['uploaded_file']['tmp_name']); //bitnami php 경로에 올린 uploaded file 임시 파일을 삭제해주는 코드. "@ 붙여주니 구동!"
	$resultArray = $result->toArray();
	//var_dump($resultArray['ObjectURL']);
	//echo "//before getObjectUrl";
	$url = $s3->getObjectUrl($bucket, $_FILES["uploaded_file"]["name"]);
	//echo "//after getObjectUrl";
    // Print the URL to the object.
    //echo $result['ObjectURL'] . PHP_EOL;
} catch (S3Exception $e) {
   echo $e->getMessage() . PHP_EOL;
}
/*try {
    // Upload data.
	//var_dump($resultArray['ObjectURL']);
	echo "//before getObjectUrl";
	$url = $s3->getObjectUrl($bucket, $keyname);
} catch (S3Exception $e) {
}*/
//echo "//before session start";

//echo "$category.$chart_id";

$Audio_contents_title = $file_Name;

$File_name2 = urlencode($file_Name);

//echo "//before File_UR start";
//echo "$File_name2 : ";
//echo $File_name2;
$File_URL = "https://s3.ap-northeast-2.amazonaws.com/hyeong/".$File_name2;

//echo "//after File_UR start";

$link2 = connect_db($host, $dbid, $dbpw, $dbname);
///echo "111";
mysqli_set_charset($link2, "utf8");
$sql2 = "INSERT INTO Total_Audio_Contents (Nick_Name, Chart_id, Category, Audio_contents_title,Script_file_address, Audio_file_address, Commend_file_address, View_Count, Subscription_count, Register_date,Script,teacher) VALUES ('$id','$chart_id','$category','$title','abcd','$File_URL','d','0','f','g','0','0')";
///echo "222";
$result2 = mysqli_query($link2,$sql2);

mysqli_close($link2);

$link3 = connect_db($host, $dbid, $dbpw, $dbname);
//echo "111";
mysqli_set_charset($link3, "utf8");

$sql3 = "INSERT INTO User_Voice_Point (ID, Chart_id, Category, pronunciation, vocalization, voice_bulk, voice_speed, voice_tone, sympathy, participants) VALUES('$id','$chart_id','$category','0','0', '0' , '0', '0', '0','0')";
$result3 = mysqli_query($link3,$sql3);
//if($result3)
//    echo ("<script language=javascript> alert('회원 등록을 완료하였습니다.');</script>");
//else
//    echo mysqli_error($link3);

mysqli_close($link3);

//echo $chart_id.$category;
//echo "<script>alert(\"<php? printf($category);\");</script>";
echo "<script>alert(\"업로드가 완료되었습니다\");</script>";
 echo("<meta http-equiv='Refresh' content='0; URL=upload.php'>");
    
   
   }else {
 echo ("<script language=javascript> alert('이미 해당 카테고리에 등록한 콘텐츠가 있습니다. 콘텐츠를 확인해 주세요.');</script>");
     echo("<meta http-equiv='Refresh' content='0; URL=upload.php'>");
     
     

   }
   mysqli_close($link);
?>