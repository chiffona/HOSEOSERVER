<?php
$con = mysqli_connect("localhost", "root", 'Wotjd@487', "sqldb") or die ('DB연결 실패했습니다.');

$NAME=$_POST["NAME"];
$PHONENUM=$_POST["PHONENUM"];
$GRADE=$_POST["GRADE"];
$PROF=$_POST["PROF"];
$CONTENTS=$_POST["CONTENTS"];
$num=0;
$PICTURE=$_POST["PICTURE"];

$sql=
"INSERT INTO membertbl values('".$NAME."','".$PHONENUM."','".$PROF."','".$CONTENTS."','".$GRADE."','".$PICTURE."','".$num."');";


$ret = mysqli_query($con, $sql);
if($ret) {
    echo "글 게시 성공"."<br>";
}
else{
    echo "글 게시 실패!!!"."<br>";
    echo "글 게시 원인 ".mysqli_error($con);
}

mysqli_close($con);
echo "<br> <a href='/HOSEOSERVER/mainhome/hoseomain.html'> <--홈 페이지로</a> ";
?>