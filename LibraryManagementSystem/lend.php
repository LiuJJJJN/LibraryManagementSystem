<?php
include "conn.php";
$bookId = $_GET['id'];
$userId = $_SESSION['id'];
if (empty($userId))
{
    echo "<script>alert('请先登录!');</script>";
    echo "<script>location.href='login.php'</script>";
    die;
}
$result = mysqli_query($conn, "select name from yx_books where id = '$bookId'");
$book_title = mysqli_fetch_array($result)[0];
$time = date("Y-m-d h:i:s");
$result = mysqli_query($conn, "insert into lend( book_id, book_title, lend_time, user_id) value('$bookId', '$book_title', '$time', '$userId')");
$result2 = mysqli_query($conn, "update yx_books set leave_number = leave_number-1 where id = $bookId");

if ($result == 1 && $result2 == 1)
{
    echo "<script>alert('借阅成功!');</script>";
}
else
{
    echo "<script>alert('借阅失败，请联系管理员');</script>";
}
echo "<script>location.href='index.php'</script>";

