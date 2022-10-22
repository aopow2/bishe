<?php
include('conn.php');
$con = @mysqli_connect("localhost","root","280996",'test');
if(!$con)
{
    die("连接失败" . mysqli_connect_error());
}   
$username=$_POST['username'];
$password=$_POST['password'];
//检查用户和密码是否正确
$sql="select id from register where username = '$username' and password = '$password' limit 1";
$che=mysqli_query($con,$sql);
$result = mysqli_fetch_array($che,MYSQLI_ASSOC);
if($result){
    echo '登录成功';
    exit('注册成功 点击跳转到管理界面<a href="../html/user.html">返回<a/>');
}else{
    echo '登录失败';
}
?>
