<?php
$con = mysqli_connect('localhost', 'root', 'HoseoICT123', 'sqldb') or die ('�뿰寃� �떎�뙣.');
$sql = "select * from boardtable";


$ret = mysqli_query($con,$sql);
$total = 1;

if(mysqli_connect_error($con)){
    echo "占쎈퓠占쎌쑎 獄쏆뮇源� : ",mysqli_connect_error();
    exit();
}
?>