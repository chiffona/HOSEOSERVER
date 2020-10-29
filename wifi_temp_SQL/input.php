 출퇴근 명부 출력
 <?php
$con = mysqli_connect('localhost', 'root', 'HoseoICT123', 'sqldb') or die ('n占쎄슈�뜝�뜾逾놂');
$sql = "SELECT * FROM membertbl inner join accese on accese.cardnum = membertbl.cardnum;";


$ret = mysqli_query($con,$sql);
$total = 1;

if(mysqli_connect_error($con)){
    echo "占쎈퓠占쎌쑎 獄쏆뮇源� : ",mysqli_connect_error();
    exit();
}
?>

<?php

					echo "<h1> member </h1>";
					echo "<table border=1>";
					echo "<tr>";
                    echo "<th>번호</th><th>이름</th><th>카드번호</th><th>시간</th><th>상태</th>"; // 紐⑹감
                    echo "</tr>";
                    
                    while($row = mysqli_fetch_array($ret)) {
                        echo"<td>", $total, "</td>";
                        echo "<td>",$row['NAME'], "</td>";
                        echo "<td>",$row['cardnum'], "</td>";
                        echo "<td>", $row['clock'], "</td>";
                        echo "<td>", $row['state'],"</td>";
                        $total++;
                        echo "</tr>";
                    }        
                    mysqli_close($con);
					?>