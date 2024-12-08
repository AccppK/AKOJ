//AKOJ部分设置与原版不同，谨慎复制
//该源码仅供参考
<?php include("template/syzoj/header.php")?>
<?php include("include/db_info.inc.php")?>
<?php
    ?>
    <h1 class="ui center aligned header">系统状态</h1>
    <span style='font-size: 20px;'><b>服务器状态:</b></span>

    <?php
        echo '                 ';
    ?>
    <span style='font-size: 20px;color:green;'><b>On</b></span>
    </br>
    <span style='font-size: 20px;'><b>是否维护:</b></span>
    <?php 
        if($OJ_IS_WEIHU){
            ?>
            <span style='font-size: 20px;color:green;'><b>On</b></span>
            </br>
            <?php
            
        }else{
            ?>
            <span style='font-size: 20px;color:red;'><b>Off</b></span>
            </br>
            <?php
            
        }
        ?>
        <span style='font-size: 20px;'><b>右键是否禁用:</b></span>
        
        <?php 
            if($OJ_YOUJIAN){
                ?>
                <span style='font-size: 20px;color: green;'><b>On</b></span>
                </br>
                <?php
            }
            else{
                ?>
                <span style='font-size: 20px;color: red;'><b>Off</b></span>
                </br>
                <?php
            }
            ?>
        <span style='font-size: 20px;'><b>全局拖尾特效是否开启:</b></span>
        <?php
            if($TUOWEI){
                ?>
                <span style='font-size: 20px;color: green;'><b>On</b></span>
                </br>
                <?php
            }
            else{
                ?>
                <span style='font-size: 20px;color: red;'><b>Off</b></span>
                </br>
                <?php
            }
            ?>
        <span style='font-size: 20px;'><b>全局点击特效是否开启:</b></span>
        <?php
            if($DIANJI){
                ?>
                <span style='font-size: 20px;color: green;'><b>On</b></span>
                </br>
                <?php
            }
            else{
                ?>
                <span style='font-size: 20px;color: red;'><b>Off</b></span>
                </br>
                <?php
            }
            ?>
        <span style='font-size: 20px;'><b>是否开启内邮功能:</b></span>
        <?php
            if($OJ_MAIL){
                ?>
                <span style='font-size: 20px;color: green;'><b>On</b></span>
                </br>
                <?php
            }
            else{
                ?>
                <span style='font-size: 20px;color: red;'><b>Off</b></span>
                </br>
                <?php

            }
            
            ?>
            <span style='font-size: 20px;'><b>是否开启防人机验证码:</b></span>
            <?php
                if($OJ_VCODE){
                    ?>
                    <span style='font-size: 20px;color: green;'><b>On</b></span>
                    </br>
                    <?php
                }
                else{
                    ?>
                    <span style='font-size: 20px;color: red;'><b>Off</b></span>
                    </br>
                    <?php
                    
                }
                ?>

        <?php include("template/syzoj/footer.php")?>
    <?php

?>
