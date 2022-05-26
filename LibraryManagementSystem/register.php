<?php
include "conn.php";
include "head.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <script>
        function checkreg() {
            if (f.username.value == "")
            {
                alert("用户名不能为空!");
                f.username.focus();
                return false;
            }
            if (f.password.value == "")
            {
                alert("密码不能为空!");
                f.password.focus();
                return false;
            }
            if (f.confirm.value == "")
            {
                alert("确认密码不能为空!");
                f.confirm.focus();
                return false;
            }
            if (f.confirm.value != f.password.value)
            {
                alert("两次密码输入不一致!");
                f.password.focus();
                return false;
            }
            if (f.email.value == '')
            {
                alert("邮箱不能为空!");
                f.email.focus();
                return false;
            }
            if (f.tel.value == '')
            {
                alert("电话不能为空!");
                f.tel.focus();
                return false;
            }
            if (f.address.value == '')
            {
                alert("地址不能为空!");
                f.address.focus();
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<form action="#" method="post" name="f" onsubmit="return checkreg()">
    <table border="1" cellspacing="0">
        <tr>
            <th colspan="2">用户注册</th>
        </tr>
        <tr>
            <td>用户名:</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>密码:</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>确认密码:</td>
            <td><input type="password" name="confirm"></td>
        </tr>
        <tr>
            <td>邮箱:</td>
            <td><input type="email" name="email"></td>
        </tr>
        <tr>
            <td>电话:</td>
            <td><input type="tel" name="tel"></td>
        </tr>
        <tr>
            <td>地址:</td>
            <td><input type="text" name="address"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit"><input type="reset"></td>
        </tr>
    </table>
</form>
</body>
</html>

<?php
//光标焦点默认在用户名
echo "<script>f.username.focus();</script>";

if (isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];
//        if (empty($username))
//        {
//            echo "<script>alert('用户名不能为空!');history.go(-1);</script>";
//            die;
//        }
//        if (empty($password))
//        {
//            echo "<script>alert('密码不能为空!');history.go(-1);</script>";
//            die;
//        }
//        if (empty($confirm))
//        {
//            echo "<script>alert('确认密码不能为空!');history.go(-1);</script>";
//            die;
//        }
//        if (empty($email))
//        {
//            echo "<script>alert('邮箱不能为空!');history.go(-1);</script>";
//            die;
//        }
//        if (empty($tel))
//        {
//            echo "<script>alert('电话不能为空!');history.go(-1);</script>";
//            die;
//        }
//        if (empty($address))
//        {
//            echo "<script>alert('地址不能为空!');history.go(-1);</script>";
//            die;
//        }
//        if ($password != $confirm)
//        {
//            echo "<script>alert('确认密码不一致!');history.go(-1);</script>";
//            die;
//        }
    //判断用户名是否存在
    if (mysqli_num_rows(mysqli_query($conn, "select * from user where name = '$username'")) >= 1)
    {
        echo "<script>alert('用户名已存在!');history.go(-1);</script>";
        die;
    }

    //更新 user 表
    $password = md5($password);
    $result = mysqli_query($conn, "insert into user(name, password, email, tel, address) value('$username', '$password', '$email', '$tel', '$address')");
    if ($result == 1)
    {
        echo "<script>alert('注册成功!');</script>";
        echo "<script>location.href='login.php'</script>";
    }
    else
    {
        echo "<script>alert('注册失败，请联系管理员');</script>";
    }
}
?>

<?php
include "foot.html";
?>
