//此文件仅供参考，禁止全盘复制！
</div>
</div>
<script src="<?php echo $OJ_CDN_URL.$path_fix."template/$OJ_TEMPLATE"?>/css/semantic.min.js"></script>
<script src="<?php echo $path_fix."template/$OJ_TEMPLATE"?>/css/Chart.min.js"></script>
<footer>
    <style>
    .footer {
        line-height: 1.4285em;
        font-family: "Lato", "Noto Sans CJK SC", "Source Han Sans SC", "PingFang SC", "Hiragino Sans GB", "Microsoft Yahei", "WenQuanYi Micro Hei", "Droid Sans Fallback", "sans-serif";
        box-sizing: inherit;
        padding: 0 !important;
        border: none !important;
        color: #888;
        font-size: 1rem;
        margin: 35px 0 14px !important;
        position: relative;
        width: 100%;
        bottom: 0;
        background: none transparent;
        border-radius: 0;
        box-shadow: none;
    }
//模板链接：<a href="http://akoj.hustoj.com/viewnews.php?id=1010" target="_blank">联系我们</a>
    </style>
    <?php include(dirname(__FILE__)."/js.php");?>
    <div class="footer">
        <div class="ui center aligned container" title="如有问题，请联系169611625@qq.com" >
            AccppK对本站做出二次开发,如有想要一起管理此网站、对网站做出贡献、捐赠网站的请联系169711625@qq.com</a><a href="http://akoj.hustoj.com/viewnews.php?id=1010" target="_blank">联系我们</a>
            <div><?php echo $domain==$DOMAIN?$OJ_NAME:"akoj"?> 使用Zhblue的 <a style="color: inherit !important;" class=" " title="Zhblue的HUSTOJ"
                    target="_blank" rel="noreferrer noopener" href="https://github.com/zhblue/hustoj">HUSTOJ</a>, 图像来自
                 <a style="color: inherit !important;" href="https://www.bing.com/">BING</a></div>
            
                
         <!--   <div> Running on <a href='https://debian.org' target='_blank'>Debian11</a> / <a href='https://www.loongson.cn' target='_blank'>Loongson 3A3000</a> </div> -->
            <?php if ($OJ_BEIAN) { ?>
            <div>
            <img src="image/icp.png">
                <a href="https://beian.miit.gov.cn/" style="text-decoration: none; color: #444444;"
                    target="_blank"><?php echo $OJ_BEIAN; ?></a>
            </div>
            <?php } ?>
        </div>
    </div>
    </div>

</footer>
<?php if (isset($_SESSION[$OJ_NAME.'_user_id'])){ ?>
        <iframe id="sk" src="session.php" height=0px width=0px ></iframe>
<?php } ?>
<?php if (file_exists(dirname(__FILE__)."/css/$OJ_CSS")){ ?>
<link href="<?php echo $path_fix."template/$OJ_TEMPLATE"?>/css/<?php echo $OJ_CSS?>" rel="stylesheet">
<?php } ?>

</body>

</html>