<style>
        table{
                border-top: 1px solid #444444;
                border-collapse: collapse;
        }
        tr{
                border-bottom: 1px solid #444444;
                padding: 10px;
        }
        td{
                border-bottom: 1px solid #efefef;
                padding: 10px;
        }
        table .even{
                background: #efefef;
        }
        .text{
                text-align:center;
                padding-top:20px;
                color:#000000
        }
        .text:hover{
                text-decoration: underline;
        }
        a:link {color : #57A0EE; text-decoration:none;}
        a:hover { text-decoration : underline;}
</style>

<?php
$con = mysqli_connect('localhost', 'root', 'HoseoICT123', 'sqldb') or die ('연결을 종료합니다.');
$sql = "select * from boardtable";


$ret = mysqli_query($con,$sql);
$total = 1;

if(mysqli_connect_error($con)){
    echo "연결실패: ",mysqli_connect_error();
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>野껊슣�뻻占쎈솇</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

</head>

<body>
	<article class="boardArticle">
		<h3>占쎌쁽占쎈짗筌∽옙 ICT �⑤벏釉경�⑨옙</h3>
		
		<table>
			<caption class="readHide"></caption>
			<thead>
			</thead>
			<tbody>
		
					 <?php
					 echo "<h1> board </h1>";
					 echo "<table border=1>";
					 echo "<tr>";
					 echo "<th>疫뀐옙 甕곕뜇�깈</th><th>占쎌젫筌륅옙</th><th>占쎌뵠�뵳占�</th><th>占쎈뻻揶쏉옙</th><th>占쎌�占쎌굨</th>";
					 echo "</tr>";
                while($rows = mysqli_fetch_assoc($ret)){ //DB占쎈퓠 占쏙옙占쎌삢占쎈쭆 占쎈쑓占쎌뵠占쎄숲 占쎈땾 (占쎈였 疫꿸퀣占�)
                        if($total%2==0){
        ?>                      <tr class = "even">
                        <?php   }
                        else{
        ?>                      <tr>
                        <?php } ?>
                <td width = "50" align = "center"><?php echo $total?></td>
                <td width = "500" align = "center">
                <a href = "view.php?NUM=<?php echo $rows['NUM']?>">
                <?php echo $rows['TITLE']?></td>
                  <td width = "100" align = "center"><?php echo $rows['NAME']?></td>
                <td width = "200" align = "center"><?php echo $rows['DT']?></td>
                <td width = "200" align = "center"><?php echo $rows['TYPE']?></td>
                </tr>
        <?php
                $total++;
                }
                mysqli_close($con);
        ?>
					<tr>
					<input type="button" value="疫뀐옙 占쎌삂占쎄쉐 " class="pull-right" onclick="location.href='upboard.php'"/>
					</tr>
			</tbody>
		</table>
	</article>
</body>
</html>