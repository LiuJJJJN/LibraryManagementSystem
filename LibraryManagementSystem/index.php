<?php
include "conn.php";
include "head.php";
?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Index</title>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
    <table border="1" cellspacing="0">
        <tr>
            <th width="100px">编号</th>
            <th width="200px">名称</th>
            <th width="100px">价格</th>
            <th width="300px">上传时间</th>
            <th width="200px">类型</th>
            <th width="100px">剩余数量</th>
            <th>操作</th>
        </tr>

        <?php
        $sql = "select * from yx_books";
        if (@urldecode($_GET['type']))
        {
            $sql = "select * from yx_books where type = '" . urldecode($_GET['type']) . "'";
        }
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        /*
         * 分页查询
         */
        $pageSize = 4; //每页显示记录数
        $pageNo = @$_GET['pn']; //当前页码
        $pageCount = ceil($num / $pageSize); //总页数
        /*
         * 设置页码上下限
         */
        if (empty($pageNo) || $pageNo < 1)
        {
            $pageNo = 1;
        }
        if ($pageNo > $pageCount)
        {
            $pageNo = $pageCount;
        }
        /*
         * 分页查询
         */
        $sql = $sql . " limit " . $pageSize * ($pageNo - 1) . ", $pageSize";
        //    echo $sql;
        $result = mysqli_query($conn, $sql);
        $n = mysqli_num_rows($result);
        for ($i = 0; $i < $n; $i++)
        {
            $arr = mysqli_fetch_array($result);
            if ($arr[6] != 0)
            {
                $bookId = $arr[0];
                $userId = $_SESSION['id'];
                $sql = "select * from lend where book_id = $bookId and user_id = $userId";
                $res = mysqli_query($conn, $sql);
                if (@mysqli_num_rows($res) >= 1)
                {
                    echo "<tr><td>$arr[0]</td><td>$arr[1]</td><td>$arr[2]</td><td>$arr[3]</td><td>$arr[4]</td><td>$arr[6]</td><td>您已经借书<br/><a href='return.php?id=$arr[0]'>我要还书</a></td></tr>";
                }
                else
                {
                    echo "<tr><td>$arr[0]</td><td>$arr[1]</td><td>$arr[2]</td><td>$arr[3]</td><td>$arr[4]</td><td>$arr[6]</td><td><a href='lend.php?id=$arr[0]'>我要借书</a></td></tr>";
                }
            }
            else
            {
                echo "<tr><td>$arr[0]</td><td>$arr[1]</td><td>$arr[2]</td><td>$arr[3]</td><td>$arr[4]</td><td>$arr[6]</td><td>库存空</td></tr>";
            }
        }
        ?>

    </table>

    <!--分页模块-->
    <table border="1" cellspacing="0">
        <tr>
            <th>
                <a href="index.php?type=<?php echo @urldecode($_GET['type']) ?>&pn=1">首页</a>
                <a href="index.php?type=<?php echo @urldecode($_GET['type']) ?>&pn=<?php echo $pageNo - 1 ?>">上一页</a>
                <a href="index.php?type=<?php echo @urldecode($_GET['type']) ?>&pn=<?php echo $pageNo + 1 ?>">下一页</a>
                <a href="index.php?type=<?php echo @urldecode($_GET['type']) ?>&pn=<?php echo $pageCount ?>">尾页</a>
                <span><?php echo "当前第 $pageNo / {$pageCount} 页, 共 {$num} 条记录, 每页最多显示 $pageSize 条记录" ?></span>
            </th>
        </tr>
    </table>
    </body>
    </html>

<?php
include "foot.html";
?>

