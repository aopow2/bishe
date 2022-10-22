<?php
$con = @mysqli_connect("localhost","root","280996",'test');
if(!$con)
{
    die("连接失败" . mysqli_connect_error());
}   
$username=$_POST['username'];
$password=$_POST['password'];
if(!preg_match('/[1-9]([0-9]{4,10})/',$username)){
    exit('你输入的账户不符合。<a href="javascript:history.back(-1);">返回<a/>');
}
if(strlen($password<6)){
    exit('你输入的密码长度不足。<a href="javascript:history.back(-1);">返回<a/>');
}
$sql1="select username from register where username='$username' limit 1";
$result = mysqli_query($con,$sql1);
if(mysqli_fetch_array($result,MYSQLI_NUM)){
    echo '用户名',$username,'已经存在。<a href="javascript:history.back(-1);">返回<a/>';
    exit;
}
$password=($password);//（这里可以进行使用md5加密 但是加密后密码进入数据库就会与登录时的密码不相匹配）
$sql2="INSERT INTO register(username,password) VALUES('$username','$password')";
if(mysqli_query($con,$sql2)){
    exit('注册成功 点击跳转到登录界面<a href="login.html">返回<a/>');
}else{
    echo '注册失败';
    echo '点击返回<a href="javascript:history.back(-1);">重试<a/>';
}
?>