<?php
include("/home/judge/src/web/include/db_info.inc.php");
include("/home/judge/src/web/template/syzoj/header-admin.php");
if(!(isset($_SESSION[$OJ_NAME.'_'.'administrator'])))
{
	echo "<center><h1><b>".$OJ_NAME."提醒您</b></h1></center><hr>
    <center><h2>很抱歉,您没有此权限!</h2></center>
    <br><br><br>
    <center><h3>您可以通过联系OJ管理员或用户管理者来解决此问题</h3>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
	if($OJ_NAME=="AKOJ"){
			echo "
				<center><h3>如有疑问,请联系少侠Dr(QQ:169711625)以解决问题哦</h3></center>";
	}
	exit(1);
}


    $conn=new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
    if($conn->connect_error){
        echo "<center><h1>数据库连接失败.</h1><hr style='border-top: 1px solid #000;'></center>";
        exit;
    }
    $sql="SELECT id,code,user_id,is_used FROM activation_codes;";
    $result=$conn->query($sql);
    if($result===false){
        echo "<center><h1>检查失败.</h1><hr style='border-top: 1px solid #000;'></center>";
        exit;
    }
?>
<center>
<table border="1" style="border-collapse: collapse; width: 50%; margin: auto;">
    <thead>
        <tr>
            <th>ID:</th>
            <th>使用的激活码:</th>
            <th>用户名:</th>
            <th>是否使用:</th>
        </tr>
    </thead>
    <tbody>
    <?php
    while($row=$result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["code"]."</td>";
        echo "<td>".$row["user_id"]."</td>";
        echo "<td>";
        if ($row["is_used"] == 0) {
            echo '<a href="/admin/cz_jihuo.php?id=' . htmlspecialchars($row["id"]) . '&is=Y">否</a>';
        } else {
            echo '<a href="/admin/cz_jihuo.php?id=' . htmlspecialchars($row["id"]) . '&is=N">是</a>';
        }
        echo "</td>";
        echo "</tr>";
    }
    $conn->close();
		?>
		<center><a class='ui button' href='/admin/insert_jihuo.php'>新增课程激活码</a></center>
    ?>
    </tbody>
</table>
</center>
