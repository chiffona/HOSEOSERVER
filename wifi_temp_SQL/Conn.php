<?php 
header("Content-Type: text/html;charset=UTF-8");
$host = 'localhost';
$user = 'root';
$pw = 'HoseoICT123'; 
$dbName = 'sqldb';
$mysqli = mysqli_connect($host, $user, $pw, $dbName)or die ('연결 실패.');
$cardnum = $_GET['cardnum'];
$state = $_GET['state'];
$num=0;

//퇴근하면
if($state=='1'){
    $OUT='OUT';
    
    if($mysqli){
        echo "MySQL successfully connected!<br/>";
        
        
        echo "<br/>cardnum = $cardnum";
        echo "<br/>state = $OUT";
        
        $query = "insert into sqldb.accese values('$num','$cardnum',DEFAULT,'$OUT');";
        
        mysqli_query($mysqli,$query);
        echo "</br>success!!";
    }
    else{
        echo mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
    

}
//출근하면
else if($state=='2'){
    $IN='IN';
    
    if($mysqli){
        echo "MySQL successfully connected!<br/>";
        
        
        echo "<br/>cardnum = $cardnum";
        echo "<br/>state = $IN";
        
        $query = "insert into sqldb.accese values('$num','$cardnum',DEFAULT,'$IN');";
        
        mysqli_query($mysqli,$query);
        echo "</br>success!!";
    }
    else{
        echo mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}

?>
