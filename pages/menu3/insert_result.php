<?php
$con = mysqli_connect("localhost", "root", 'Wotjd@487', "sqldb") or die ('연결 실패.');
$NUM=0;
$NAME=$_POST["NAME"];
$TITLE=$_POST["TITLE"];
$TYPE=$_POST["TYPE"];
$CONTENT=$_POST["CONTENT"];
$mDATE=date("Y-m-j");
$URL = '../offcanvas/board.php';


$sql=
"INSERT INTO boardtable values('".$NUM."','".$NAME."','".$TITLE."','".$CONTENT."','".$TYPE."','".$mDATE."');";

$ret = mysqli_query($con, $sql);

if($ret) {
    ?>
    <script>
    alert("<?php echo "성공적으로 게시되었습니다."?>");
    location.replace("<?php echo $URL?>");
    </script>
	<?php
}
else{
    echo "연결 실패!"."<br>";
    echo "오류 보고 ".mysqli_error($con);
}

mysqli_close($con);
echo "<br> <a href='index.html'> <--메인 페이지로 이동</a> ";
?>