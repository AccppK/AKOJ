<?php include("/home/judge/src/web/include/db_info.inc.php")?>
<?php
    //请自行添加权限设置.
    //请了解删除题目的危险性.
    //请了解我们不会承担责任.
    //如果需要,请开启db_info.inc.php里的$DELETE_PROBLEM_PAGE.
    //请及时完成备份
    //代码部分.
  if($DELETE_PROBLEM_PAGE){
      $conn=new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);//连接数据库,请确保您安装的是HUSTOJ,并且是较新的开源版本.
  $sql="DELETE FROM `problem`;";//删除所有题目数据,注意,此操作有一定的危险性.
  if($conn->query($sql)){
      echo "成功执行了删除所有题目操作,如有报错,请立刻还原备份.";
  }else{
    echo "执行错误.";
  }
  $conn->close();
}else{
  echo "您没有开启删除题目的相关变量!";
}
?>
