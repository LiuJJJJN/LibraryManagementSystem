<?php
include "conn.php";

$bookId = $_GET['id'];
$userId = $_SESSION['id'];
$sql = "delete from lend where book_id = $bookId and user_id = $userId";
$result = mysqli_query($conn, $sql);
$sql = "update yx_books set leave_number = leave_number+1 where id = $bookId";
$result2 = mysqli_query($conn, $sql);
if ($result == 1 && $result2 == 1)
{
    echo "<script>alert('还书成功');</script>";
}
else
{
    echo "<script>alert('还书失败，请联系管理员');</script>";
}
echo "<script>location.href='index.php'</script>";