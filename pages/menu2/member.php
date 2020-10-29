<?php
$con = mysqli_connect('localhost', 'root', 'Wotjd@487', 'sqldb') or die ('데이터베이스 연결에 문제가 있습니다.\n관리자에게 문의 바랍니다.');
$sql = "select * from membertbl";


$ret = mysqli_query($con,$sql);


if(mysqli_connect_error($con)){
    echo "오류원인 : ",mysqli_connect_error();
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>연구실 인원</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

</head>

<body>
	<article class="boardArticle">
		<h3>자동차 ICT학과</h3>
		
		<table>
			<caption class="readHide"></caption>
			<thead>
			</thead>
			<tbody>
			

					<?php
					$i=1;
					echo "<h1> member </h1>";
					echo "<table border=1>";
					echo "<tr>";
                    echo "<th>사진</th><th>이름</th><th>학년</th><th>핸드폰</th><th>담당교수</th><th>프로필</th>"; // 목차
                    echo "</tr>";
                    
                    while($row = mysqli_fetch_array($ret)) {
                        echo "<tr>";
                        echo "<td>","<img src='.\Movies\[$i].jpg'>","</td>";
                        echo "<td>",$row['NAME'],"</td>";
                        echo "<td>",$row['GRADE'], "</td>";
                        echo "<td>",$row['PHONENUM'], "</td>";
                        echo "<td>", $row['PROF'], "</td>";
                        echo "<td>", $row['CONTENTS'],"</td>";
                        echo "</tr>";
                        $i++;
                    }
                   
                    mysqli_close($con);
                    $i=0;
					?>
					
					
			</tbody>
		</table>
	</article>
</body>
</html>