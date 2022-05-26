<?php
session_start();

$conn = mysqli_connect("localhost", "root", "129807", "book");
if ($conn == null)
{
    echo "数据库链接失败, 请查看修改 conn.php 中相关配置!";
    die;
}
