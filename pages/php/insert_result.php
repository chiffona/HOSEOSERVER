<?php
$con = mysqli_connect("localhost", "root", 'Wotjd@487', "sqldb") or die ('DB연결 실패했습니다.');
$NUM=0;
$NAME=$_POST["NAME"];
$TITLE=$_POST["TITLE"];
$TYPE=$_POST["TYPE"];
$CONTENT=$_POST["CONTENT"];
$mDATE=date("Y-m-j");
$URL = './Content.php';


$sql=
"INSERT INTO boardtable values('".$NUM."','".$NAME."','".$TITLE."','".$CONTENT."','".$TYPE."','".$mDATE."');";

$ret = mysqli_query($con, $sql);
if($ret) {
    ?>
    <script>
    alert("<?php echo "글이 등록되었습니다."?>");
    location.replace("<?php echo $URL?>");
    </script>
<?php
}
else{
    echo "글 게시 실패!!!"."<br>";
    echo "글 게시 원인 ".mysqli_error($con);
}

mysqli_close($con);
echo "<br> <a href='hoseomain.html'> <--홈 페이지로</a> ";
?>