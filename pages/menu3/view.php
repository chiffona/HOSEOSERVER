<style>
.view_table {
border: 1px solid #444444;
margin-top: 30px;
}
.view_title {
height: 30px;
text-align: center;
background-color: #cccccc;
color: white;
width: 1000px;
}
.view_id {
text-align: center;
background-color: #EEEEEE;
width: 30px;
}
.view_id2 {
background-color: white;
width: 60px;
}
.view_hit {
background-color: #EEEEEE;
width: 30px;
text-align: center;
}
.view_hit2 {
background-color: white;
width: 60px;
}
.view_content {
padding-top: 20px;
border-top: 1px solid #444444;
height: 500px;
}
.view_btn {
width: 700px;
height: 200px;
text-align: center;
margin: auto;
margin-top: 50px;
}
.view_btn1 {
height: 50px;
width: 100px;
font-size: 20px;
text-align: center;
background-color: white;
border: 2px solid black;
border-radius: 10px;
}
.view_comment_input {
width: 700px;
height: 500px;
text-align: center;
margin: auto;
}
.view_text3 {
font-weight: bold;
float: left;
margin-left: 20px;
}
.view_com_id {
width: 100px;
}
.view_comment {
width: 500px;
}
</style>

<?php
$con = mysqli_connect('localhost', 'root', 'Wotjd@487', 'sqldb') or die ('연동 실패');
$NUM = $_GET['NUM'];
session_start();
$sql = " select * from boardtable where NUM= $NUM";
$ret = mysqli_query($con,$sql);
$rows = mysqli_fetch_array($ret);

if(mysqli_connect_error($con)){
    echo "에러 발생 : ",mysqli_connect_error();
    exit();
}
?>
 
        <table class="view_table" align=center>
        <tr>
                <td colspan="4" class="view_title"><?php echo $rows['TITLE']?></td>
        </tr>
        <tr>
                <td class="view_id">작성자</td>
                <td class="view_id2"><?php echo $rows['NAME']?></td>
                
                <td class="view_hit">시간</td>
                <td class="view_hit2"><?php echo $rows['DT']?></td>
        </tr>
 
 
        <tr>
                <td colspan="4" class="view_CONTENTS" valign="top">
                <?php echo $rows['CONTENTS']?></td>
        </tr>
        </table>
 
 
        <!-- MODIFY & DELETE -->
        <div class="view_btn">
                <button class="view_btn1" onclick="location.href='./Content.php'">목록으로</button>
                <button class="view_btn1" onclick="location.href='./modify.php?number=<?=$NUM?>&id=<?=$_SESSION['userid']?>'">수정</button>

                <button class="view_btn1" onclick="location.href='./delete.php?number=<?=$NUM?>&id=<?=$_SESSION['userid']?>'">삭제</button>
        </div>