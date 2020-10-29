 <?php
$con = mysqli_connect('localhost', 'root', 'Wotjd@487', 'stock') or die ('연동 실패');
$sql = "select 주소 from clc";
$ret = mysqli_query($con,$sql);

if(mysqli_connect_error($con)){
    echo "에러 발생 : ",mysqli_connect_error();
    exit();
}

$add = array();

while($rows = mysqli_fetch_assoc($ret)){
    $add[] = $rows['주소'];
}

for($i=0; $i<22949;$i++){
    echo "$add[$i] <br/>";
}

mysqli_close($con);
?>