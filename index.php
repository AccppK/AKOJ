
<!DOCTYPE html>
<html lang="en">

<head>
    
</head>

<body>
    <span class="js-cursor-container"></span>
    <script>
        (function fairyDustCursor() {

            var possibleColors = ["#D61C59", "#E7D84B", "#1B8798"]
            var width = window.innerWidth;
            var height = window.innerHeight;
            var cursor = { x: width / 2, y: width / 2 };
            var particles = [];

            function init() {
                bindEvents();
                loop();
            }

            // Bind events that are needed
            function bindEvents() {
                document.addEventListener('mousemove', onMouseMove);
                window.addEventListener('resize', onWindowResize);
            }

            function onWindowResize(e) {
                width = window.innerWidth;
                height = window.innerHeight;
            }

            function onMouseMove(e) {
                cursor.x = e.clientX;
                cursor.y = e.clientY;

                addParticle(cursor.x, cursor.y, possibleColors[Math.floor(Math.random() * possibleColors.length)]);
            }

            function addParticle(x, y, color) {
                var particle = new Particle();
                particle.init(x, y, color);
                particles.push(particle);
            }

            function updateParticles() {

                // Updated
                for (var i = 0; i < particles.length; i++) {
                    particles[i].update();
                }

                // Remove dead particles
                for (var i = particles.length - 1; i >= 0; i--) {
                    if (particles[i].lifeSpan < 0) {
                        particles[i].die();
                        particles.splice(i, 1);
                    }
                }

            }

            function loop() {
                requestAnimationFrame(loop);
                updateParticles();
            }

            /**
             * Particles
             */

            function Particle() {

                this.character = "*";
                this.lifeSpan = 120; //ms
                this.initialStyles = {
                    "position": "fixed",
                    "display": "inline-block",
                    "top": "0px",
                    "left": "0px",
                    "pointerEvents": "none",
                    "touch-action": "none",
                    "z-index": "10000000",
                    "fontSize": "25px",
                    "will-change": "transform"
                };

                // Init, and set properties
                this.init = function (x, y, color) {

                    this.velocity = {
                        x: (Math.random() < 0.5 ? -1 : 1) * (Math.random() / 2),
                        y: 1
                    };

                    this.position = { x: x + 10, y: y + 10 };
                    this.initialStyles.color = color;

                    this.element = document.createElement('span');
                    this.element.innerHTML = this.character;
                    applyProperties(this.element, this.initialStyles);
                    this.update();

                    document.querySelector('.js-cursor-container').appendChild(this.element);
                };

                this.update = function () {
                    this.position.x += this.velocity.x;
                    this.position.y += this.velocity.y;
                    this.lifeSpan--;

                    this.element.style.transform = "translate3d(" + this.position.x + "px," + this.position.y + "px, 0) scale(" + (this.lifeSpan / 120) + ")";
                }

                this.die = function () {
                    this.element.parentNode.removeChild(this.element);
                }

            }

            /**
             * Utils
             */

            // Applies css `properties` to an element.
            function applyProperties(target, properties) {
                for (var key in properties) {
                    target.style[key] = properties[key];
                }
            }

            if (!('ontouchstart' in window || navigator.msMaxTouchPoints)) init();
        })();    
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKOJ</title>
</head>

<body>
    <!-- 网页鼠标点击特效（爱心） -->
    <script type="text/javascript">
         ! function (e, t, a) {
            function r() {
                for (var e = 0; e < s.length; e++) s[e].alpha <= 0 ? (t.body.removeChild(s[e].el), s.splice(e, 1)) : (s[
                        e].y--, s[e].scale += .004, s[e].alpha -= .013, s[e].el.style.cssText = "left:" + s[e].x +
                    "px;top:" + s[e].y + "px;opacity:" + s[e].alpha + ";transform:scale(" + s[e].scale + "," + s[e]
                    .scale + ") rotate(45deg);background:" + s[e].color + ";z-index:99999");
                requestAnimationFrame(r)
            }

            function n() {
                var t = "function" == typeof e.onclick && e.onclick;
                e.onclick = function (e) {
                    t && t(), o(e)
                }
            }

            function o(e) {
                var a = t.createElement("div");
                a.className = "heart", s.push({
                    el: a,
                    x: e.clientX - 5,
                    y: e.clientY - 5,
                    scale: 1,
                    alpha: 1,
                    color: c()
                }), t.body.appendChild(a)
            }

            function i(e) {
                var a = t.createElement("style");
                a.type = "text/css";
                try {
                    a.appendChild(t.createTextNode(e))
                } catch (t) {
                    a.styleSheet.cssText = e
                }
                t.getElementsByTagName("head")[0].appendChild(a)
            }

            function c() {
                return "rgb(" + ~~(255 * Math.random()) + "," + ~~(255 * Math.random()) + "," + ~~(255 * Math
                    .random()) + ")"
            }
            var s = [];
            e.requestAnimationFrame = e.requestAnimationFrame || e.webkitRequestAnimationFrame || e
                .mozRequestAnimationFrame || e.oRequestAnimationFrame || e.msRequestAnimationFrame || function (e) {
                    setTimeout(e, 1e3 / 60)
                }, i(
                    ".heart{width: 10px;height: 10px;position: fixed;background: #f00;transform: rotate(45deg);-webkit-transform: rotate(45deg);-moz-transform: rotate(45deg);}.heart:after,.heart:before{content: '';width: inherit;height: inherit;background: inherit;border-radius: 50%;-webkit-border-radius: 50%;-moz-border-radius: 50%;position: fixed;}.heart:after{top: -5px;}.heart:before{left: -5px;}"
                ), n(), r()
        }(window, document);
    </script>
</body>

</html>
<?php $show_title="$MSG_HOME - $OJ_NAME"; ?>
<?php include("template/$OJ_TEMPLATE/header.php");?>
<div class="padding">
    <div class="ui three column grid">
        <div class="eleven wide column">
            <h4 class="ui top attached block header"><i class="ui info icon"></i><?php echo $MSG_NEWS;?></h4>
            <div class="ui bottom attached segment">
                <table class="ui very basic table">
                    <thead>
                        <tr>
                            <th><?php echo $MSG_TITLE;?></th>
                            <th><?php echo $MSG_TIME;?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql_news = "select * FROM `news` WHERE `defunct`!='Y' AND `title`!='faqs.cn' ORDER BY `importance` ASC,`time` DESC LIMIT 10";
                        $result_news = mysql_query_cache( $sql_news );
                        if ( $result_news ) {
                            foreach ( $result_news as $row ) {
                                echo "<tr>"."<td>"
                                    ."<a href=\"viewnews.php?id=".$row["news_id"]."\">"
                                    .$row["title"]."</a></td>"
                                    ."<td>".$row["time"]."</td>"."</tr>";
                            }
                        }else{
                            echo "check database connection or account ! ";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
<?php
/* 本月之星  */
$month_id=mysql_query_cache("select solution_id from solution where  in_date<date_add(curdate(),interval -day(curdate())+1 DAY) order by solution_id desc limit 1;");
if(!empty( $month_id) && isset($month_id[0][0]) ) $month_id=$month_id[0][0];else $month_id=0;
if($NOIP_flag[0]==0)$view_month_rank=mysql_query_cache("select user_id,nick,count(distinct(problem_id)) ac from solution where solution_id>$month_id and problem_id>0  and user_id not in (".$OJ_RANK_HIDDEN.")  and result=4 group by user_id,nick order by ac desc limit 10");
            if ( !empty($view_month_rank) ) {
        ?>
            <h4 class="ui top attached block header"><i class="ui star icon"></i><?php echo "本月榜单"?></h4>
            <div class="ui bottom attached segment">
                <table class="ui very basic center aligned table" style="table-layout: fixed; ">
                    <tbody>
        <?php
                            foreach ( $view_month_rank as $row ) {
                                    echo "<tr>".
                                            "<td><a target='_blank' href='userinfo.php?user=".htmlentities($row[0],ENT_QUOTES,"UTF-8")."'>".htmlentities($row[0],ENT_QUOTES,"UTF-8")."</a></td>".
                                            "<td>".($row[1])."</td>".
                                            "<td>".($row[2])."</td>".
                                            "</tr>";
                            }
        ?>
                    </tbody>
                </table>
            </div>
        <?php
            }
/* 本月之星  */
?>

            <h4 class="ui top attached block header"><i class="ui star icon"></i><?php echo $OJ_INDEX_NEWS_TITLE;?></h4>
            <div class="ui bottom attached segment">
                <table class="ui very basic left aligned table" style="table-layout: fixed; ">
                    <tbody>

                        <?php
                        $sql_news = "select * FROM `news` WHERE `defunct`!='Y' AND `title`='$OJ_INDEX_NEWS_TITLE' ORDER BY `importance` ASC,`time` DESC LIMIT 10";
                        $result_news = mysql_query_cache( $sql_news );
                        if ( $result_news ) {
                            foreach ( $result_news as $row ) {
                                echo "<tr>"."<td>"
                                    .bbcode_to_html($row["content"])."</td></tr>";
                            }
                        }
                        ?>
                         <tr><td>
                                <center> 最近的提交量:
                                        <?php echo $speed?> .
                                        <div id=submission style="width:80%;height:300px"></div>
                                </center>

                        </td></tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="right floated five wide column">
<h4 class="ui top attached block header"><i class="time icon"></i>倒计时</h4>
   <div class="ui bottom attached segment">
  <div class="section__body">
	<h2><center>
		<font color="#E80017">2</font><font color="#D1002E">0</font><font color="#BA0045">2</font><font color="#A3005C">5</font><font color="#8C0073">年</font><font color="#75008A">-</font><font color="#5E00A1">CSP</font><font color="#4700B8">-J </font><font color="#3000CF">倒</font><font color="#1900E6">计</font><font color="#0200FD">时</font>
	</center></h2><br>
	<center>
			<div id="CountMsg" class="HotDate">
			   <h2><span id="t_d">1</span></h2>
			</div>
	</center>
	 <script type="text/javascript"> function getRTime() {
        var EndTime = new Date('2025/09/21 08:00:00');
        var NowTime = new Date();
        var t = EndTime.getTime() - NowTime.getTime();
        var d = Math.floor(t / 1000 / 60 / 60 / 24);
        document.getElementById("t_d").innerHTML = "距离比赛 "+ d + " 天";
    }
    getRTime() ;
    </script>
 
  </div></div>
<h4 class="ui top attached block header"><i class="home icon"></i>欢迎回家</h4>
   <div class="ui bottom attached segment">
  <div class="section__body">


			
			
	</center>
	 <?php echo "欢迎回来,"?><?php echo $_SESSION[$OJ_NAME.'_user_id']?><?php echo "!"?>
    </script>
 
  </div></div>
	  
  
 

        <!--签到功能-->
        <h4 class="ui top attached block header"><i class="calendar check icon"></i>每日打卡</h4>
        <div class="ui bottom attached center aligned segment">
            <?php
                $OJ_DARK = false;
                $sql_lianxu = "SELECT lianxu FROM qiandao WHERE user_id = ? ORDER BY time DESC LIMIT 1";
                $result_lianxu = pdo_query($sql_lianxu,$_SESSION[$OJ_NAME.'_user_id']);
                $lianxu = $result_lianxu[0][0]?$result_lianxu[0][0]:0;
                $next_day = $lianxu + 1;

                $currentDate = date('Y-m-d');
                $userId = $_SESSION[$OJ_NAME.'_user_id'];
                $sql_search = "SELECT * FROM qiandao WHERE user_id = ? AND DATE(time) = ?";
                $result_search = pdo_query($sql_search,$userId,$currentDate);
                $search = $result_search[0];

                $add_score = "2金币";//每日签到金币值
                $add_score1 = "2金币";//每日签到金币值
                
                //连续登录有奖
                if($lianxu == 6) $add_score = "<font color=orange>[连续登录7天专享]5金币</font>";
                else if($lianxu == 14) $add_score = "<font color=orange>[连续登录15天专享]8金币</font>";
                else if($lianxu == 29) $add_score = "<font color=orange>[连续登录30天专享]15金币</font>";
                else if($lianxu == 65) $add_score = "<font color=orange>[连续登录66天专享]25金币</font>";
                else if($lianxu == 149) $add_score = "<font color=orange>[连续登录150天专享]36金币</font>";
                else if($lianxu == 364) $add_score = "<font color=orange>[连续登录365天专享]73金币</font>";
                else if($lianxu == 665) $add_score = "<font color=orange>[连续登录666天专享]128金币</font>";
                else if($lianxu == 999) $add_score = "<font color=orange>[连续登录1000天专享]288金币</font>";
                else if($lianxu == 1313) $add_score = "<font color=orange>[连续登录1314天专享]520金币</font>";

                //连续登录有奖
                if($next_day == 7) $add_score1 = "<font color=orange>[连续登录7天专享]5金币</font>";
                else if($next_day == 15) $add_score1 = "<font color=orange>[连续登录15天专享]8金币</font>";
                else if($next_day == 30) $add_score1 = "<font color=orange>[连续登录30天专享]15金币</font>";
                else if($next_day == 66) $add_score1 = "<font color=orange>[连续登录66天专享]25金币</font>";
                else if($next_day == 150) $add_score1 = "<font color=orange>[连续登录150天专享]36金币</font>";
                else if($next_day == 365) $add_score1 = "<font color=orange>[连续登录365天专享]73金币</font>";
                else if($next_day == 666) $add_score1 = "<font color=orange>[连续登录666天专享]128金币</font>";
                else if($next_day == 1000) $add_score1 = "<font color=orange>[连续登录1000天专享]288金币</font>";
                else if($next_day == 1314) $add_score1 = "<font color=orange>[连续登录1314天专享]520金币</font>";
            ?>
          <p style='margin-top: -11px;'><span style='font-size: 14px;'>连续打卡<?php echo $lianxu?>天-<?php echo $search?"明日打卡奖励":"今日打卡奖励"?>:<?php echo $search?$add_score1:$add_score;?></span></p><p style='margin-top: <?php echo $OJ_DARK?"21":"29"?>px;font-size: 42px;'>
          <?php
          if($search) {
                echo "<span style='font-size: ";
                echo $OJ_DARK?"48px;":"42px;";
                echo "color:green;";
                echo "'><b>已打卡</b></span>";
          }
          else if(!isset($_SESSION[$OJ_NAME.'_user_id'])){
            echo "<a href='loginpage.php' style='font-size:";
            echo $OJ_DARK?"48px;":"42px;";
            echo "color:orange;";
            echo "'><b>登录后打卡</b></a>";
          }else{
            echo "<a href='qiandao_update.php' style='font-size: ";
            echo $OJ_DARK?"48px;":"42px;";
            echo "color:orange;";
            echo "'><b>点我打卡</b></a>";
          }
          ?>
          </p><p style='margin-top: <?php echo $OJ_DARK?"20":"29";?>px;line-height: 1.0;'><span id="hitokoto-display" style="font-size: 14px;" class='this-div'></span></p>
        </div>
        <script>  
            $.get('https://v1.hitokoto.cn/?c=a', function (data) {  
            if (typeof data === 'string') data = JSON.parse(data);  
            var hitokotoText = data.hitokoto;  
            // if (data.from) {  
            //     hitokotoText += ' —— ' + data.from;  
            // }
            $('#hitokoto-display').text(hitokotoText);
            });  
        </script>

            <h4 class="ui top attached block header"><i class="ui rss icon"></i> <?php echo $MSG_RECENT_PROBLEM;?> </h4>
            <div class="ui bottom attached segment">
                <table class="ui very basic center aligned table">
                    <thead>
                        <tr>
                            <th width="60%"><?php echo $MSG_TITLE;?></th>
                            <th width="40%"><?php echo $MSG_TIME;?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        // 未解之谜
                         if(isset($_SESSION[$OJ_NAME."_user_id"])) $user_id=$_SESSION[$OJ_NAME."_user_id"]; else $user_id='guest';
                        $sql_problems = "select p.problem_id,title,max_in_date from (select problem_id,min(result) best,max(in_date) max_in_date from solution
                                where user_id=? and result>=4 and problem_id>0 group by problem_id ) s inner join problem p on s.problem_id=p.problem_id
                             where s.best>4 order by max_in_date desc  LIMIT 5";
                        $result_problems = mysql_query_cache( $sql_problems ,$user_id);
                        if ( $result_problems ) {
                            $i = 1;
                            foreach ( $result_problems as $row ) {
                                echo "<tr>"."<td>"
                                    ."<a href=\"problem.php?id=".$row["problem_id"]."\">"
                                    .$row["title"]."</a></td>"
                                    ."<td>".substr($row["max_in_date"],0,10)."</td>"."</tr>";
                            }
                        }

                    ?>
                    </tbody>
                </table>
            </div>
            <h4 class="ui top attached block header"><i class="ui search icon"></i><?php echo $MSG_SEARCH;?></h4>
            <div class="ui bottom attached segment">
                <form action="problem.php" method="get">
                    <div class="ui search" style="width: 100%; ">
                        <div class="ui left icon input" style="width: 100%; ">
                            <input class="prompt" style="width: 100%; " type="text" placeholder="<?php echo $MSG_PROBLEM_ID ;?> …" name="id">
                            <i class="search icon"></i>
                        </div>
                        <div class="results" style="width: 100%; "></div>
                    </div>
                </form>
            </div>
            <h4 class="ui top attached block header"><i class="ui calendar icon"></i><?php echo $MSG_RECENT_CONTEST ;?></h4>
            <div class="ui bottom attached center aligned segment">
                <table class="ui very basic center aligned table">
                    <thead>
                        <tr>
                            <th><?php echo $MSG_CONTEST_NAME;?></th>
                            <th><?php echo $MSG_START_TIME;?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql_contests = "select * FROM `contest` where defunct='N' ORDER BY `contest_id` DESC LIMIT 5";
                        $result_contests = mysql_query_cache( $sql_contests );
                        if ( $result_contests ) {
                            $i = 1;
                            foreach ( $result_contests as $row ) {
                                echo "<tr>"."<td>"
                                    ."<a href=\"contest.php?cid=".$row["contest_id"]."\">"
                                    .$row["title"]."</a></td>"
                                    ."<td>".$row["start_time"]."</td>"."</tr>";
                            }
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include("template/$OJ_TEMPLATE/footer.php");?>

  <script language="javascript" type="text/javascript" src="<?php echo $OJ_CDN_URL?>include/jquery.flot.js"></script>
        <script type="text/javascript">
                $( function () {
                        var d1 = <?php echo json_encode($chart_data_all)?>;
                        var d2 = <?php echo json_encode($chart_data_ac)?>;
                        $.plot( $( "#submission" ), [ {
                                label: "<?php echo $MSG_SUBMIT?>",
                                data: d1,
                                lines: {
                                        show: true
                                }
                        }, {
                                label: "<?php echo $MSG_SOVLED?>",
                                data: d2,
                                bars: {
                                        show: true
                                }
                        } ], {
                                grid: {
                                        backgroundColor: {
                                                colors: [ "#fff", "#eee" ]
                                        }
                                },
                                xaxis: {
                                        mode: "time" //,
                                                //max:(new Date()).getTime(),
                                                //min:(new Date()).getTime()-100*24*3600*1000
                                }
                        } );
                } );
                //alert((new Date()).getTime());
        </script>

