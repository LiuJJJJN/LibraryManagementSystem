<?php
include "conn.php";
include "head.php";
?>

<?php
if (@$_GET['logout'] == '1')
{
    session_destroy();
    echo "<script>alert('退出成功!');location.href='login.php';</script>";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<form action="#" method="post">
    <table border="1" cellspacing="0">
        <tr>
            <th colspan="2">用户登录</th>
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
            <td><a href="register.php">注册新用户</a></td>
            <td><input type="submit" name="submit" value="登录"></td>
        </tr>
    </table>
</form>
</body>
</html>

<?php
include "foot.html";
?>

<?php
if (isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username) || empty($password))
    {
        echo "<script>alert('用户名密码不能为空!');</script>";
        die;
    }
    $password = md5($password);
    $result = mysqli_query($conn, "select id from user where name = '$username' and password = '$password'");
    if (mysqli_num_rows($result) >= 1)
    {
        $id = mysqli_fetch_array($result)[0];
        $_SESSION['id'] = $id;
        echo "<script>alert('登录成功!');</script>";
        echo "<script>location.href='index.php'</script>";
    }
    else
    {
        echo "<script>alert('用户名密码错误!')</script>";
    }

}
?>
