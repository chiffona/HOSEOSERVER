<?php
session_start();


include "db_info.php";

$max_thread_result=mysql_query("select max(thread) from images",$conn);
$max_thread_fetch=mysql_fetch_array($max_thread_result);

$name=$_POST['name'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$title=$_POST['title'];
$comment=$_POST['comment'];
$REMOTE_ADDR=$_SERVER["REMOTE_ADDR"];

$filename=NULL;

$max_thread=ceil($max_thread_fetch[0]/1000)*1000+1000;

if($_FILES['upfile']['name']){
    $filename=$_FILES['upfile']['name'];
    $path='/files/'.$filename;
    move_uploaded_file($_FILES['upfile']['tmp_name'],$path);
}

$query="insert into $board(thread,depth,name,pass,email,title,see,wdate,ip,comment,filename) values('$max_thread',0,'$name','$pass','$email','$title',0,now(),'$REMOTE_ADDR','$comment','$filename')";

$result=mysql_query($query,$conn);


mysql_close($conn);

echo "<meta http-equiv='refresh' content='1; URL=list.php?no=0'>";
?>