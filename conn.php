<?php
$con = @mysqli_connect("localhost","root","280996",'test');
if(!$con)
{
    die("连接失败" . mysqli_connect_error());
}   
?>