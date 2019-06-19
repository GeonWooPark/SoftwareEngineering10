<?php


include 'db.php';
   	require '../../vendor/autoload.php';
//echo "<script>alert(\"<php? printf($chart_id+$category);\");</script>";
use Aws\S3\S3Client; 
use Aws\S3\Exception\S3Exception;

session_start();

$id = $_SESSION['id']; // 세션에 저장되어 있는 id 불러옴

$file_Name = basename($_FILES["v_uploaded_file"]["name"]);
$title = $_POST['title'];
$contents = $_POST['contents'];
$category = $_POST['category'];
//$script = $_POST['script'];
//echo "<script>alert(\"<php? printf($contents);\");</script>";
//echo "<script>alert(\"<php? printf($title);\");</script>";
//echo "<script>alert(\"<php? printf($file_Name);\");</script>";
//$strTok =explode(':' , $script);
//$chart_id=$strTok[0];
//$category=$strTok[2];
   $link = connect_db($host, $dbid, $dbpw, $dbname);
   mysqli_set_charset($link, "utf8");
  
   $sql = "select * from Lecture where id='$id' and title='$title'";
   $result = mysqli_query($link,$sql);
   $count = mysqli_num_rows($result);

   // COUNT가 1보다 작으면 일치하는 데이터가 없으므로 
   if($count < 1){

// echo "link before s3 put!!!"; 

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
        'Key'    => $_FILES["v_uploaded_file"]["name"],  //사용자 시스템에 있을 때의 파일 이름
        'SourceFile'   => $_FILES["v_uploaded_file"]["tmp_name"],//웹서버에 임시로 저장된 파일의 위치
        'ContentType'=>$_FILES['v_uploaded_file']['type'],  //업로드 파일의 MIME 타입
        'ACL'    => 'public-read' // only read
    ]);
//echo "after result";
//	chmod($_FILES['uploaded_file']['tmp_name'],0777);
    @unlink($_FILES['v_uploaded_file']['tmp_name']); //bitnami php 경로에 올린 uploaded file 임시 파일을 삭제해주는 코드. "@ 붙여주니 구동!"
	$resultArray = $result->toArray();
	//var_dump($resultArray['ObjectURL']);
	//echo "//before getObjectUrl";
	$url = $s3->getObjectUrl($bucket, $_FILES["v_uploaded_file"]["name"]);
//	echo "after getObjectUrl";
    // Print the URL to the object.
    //echo $result['ObjectURL'] . PHP_EOL;
} catch (S3Exception $e) {
 //  echo $e->getMessage() . PHP_EOL;
}


//echo "$category.$chart_id";

//$Audio_contents_title = $file_Name;

$File_name2 = urlencode($file_Name);

$File_URL = "https://s3.ap-northeast-2.amazonaws.com/hyeong/".$File_name2;

//echo "<script>alert(\"<php? printf($File_URL);\");</script>";
	$today = date("Y-m-d"); //현재 날짜 저장
	
$link2 = connect_db($host, $dbid, $dbpw, $dbname);
///echo "111";
mysqli_set_charset($link2, "utf8");
$sql2 = "INSERT INTO Lecture (id, title, video_file_address, date,content_text, category) VALUES ('$id','$title','$File_URL','$today','$contents','$category')";
///echo "222";
$result2 = mysqli_query($link2,$sql2);
//if($result2)
//    echo ("<script language=javascript> alert('회원 등록을 완료하였습니다.');</script>");
//else
//    echo mysqli_error($link2);
mysqli_close($link2);


echo "<script>alert(\"업로드가 완료되었습니다\");</script>";
 echo("<meta http-equiv='Refresh' content='0; URL=dashboard.php'>");
    
   
   }else {
 echo ("<script language=javascript> alert('동일한 제목으로 등록 하셨습니다. 강의를 확인해 주세요.');</script>");
     echo("<meta http-equiv='Refresh' content='0; URL=dashboard.php'>");
     
     

   }
   mysqli_close($link);
?>