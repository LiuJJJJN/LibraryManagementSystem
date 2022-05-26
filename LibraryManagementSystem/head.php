<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>图书管理系统</title>
    <link rel="stylesheet" href="head.css">
</head>

<body>
<div id="logo"></div>
<div id="nav">
    <ul id="list">
        <li><a href="index.php" title="首页">首页</a></li>
        <li><a href="index.php?type=<?php echo urlencode('网页美工') ?>" title="网页美工">网页美工</a></li>
        <li><a href="index.php?type=<?php echo urlencode('网络营销') ?>" title="网络营销">网络营销</a></li>
        <li><a href="index.php?type=<?php echo urlencode('Asp编程') ?>" title="Asp编程">Asp编程</a></li>
        <li><a href="index.php?type=<?php echo urlencode('PHP编程') ?>" title="PHP编程">PHP编程</a></li>
        <li><a href="index.php?type=<?php echo urlencode('软件开发') ?>" title="软件开发">软件开发</a></li>
        <li>
            <?php
            if (@$_SESSION['id'])
            {
                echo "<a href='login.php?logout=1' title='退出登录'>退出登录</a>";
            }
            else
            {
                echo "<a href='login.php' title='用户登录'>用户登录</a>";
            }
            ?>
        </li>
    </ul>
</div>
</body>
</html>
