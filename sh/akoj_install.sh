git clone http://dl.hustoj.com/install.sh
echo "Hust OJ部署完毕,启动AKOJ部署计划"
cd /home/judge/src/web/template/syzoj/
rm index.php
curl -O https://github.com/AccppK/AKOJ/blob/main/index.php
cd /home/judge/src/web/
curl -O https://github.com/AccppK/AKOJ/blob/main/web/delete_problem.php
curl -O https://github.com/AccppK/AKOJ/blob/main/web/how_jihuo.php
curl -O https://github.com/AccppK/AKOJ/blob/main/web/jihuo_code.php
curl -O https://github.com/AccppK/AKOJ/blob/main/web/state.php
curl -O https://github.com/AccppK/AKOJ/blob/main/web/verify_activation_code.php
cd admin
curl -O https://github.com/AccppK/AKOJ/blob/main/web/admin/admin_jihuo.php
curl -O https://github.com/AccppK/AKOJ/blob/main/web/admin/cz_jihuo.php
curl -O https://github.com/AccppK/AKOJ/blob/main/web/admin/insert_jihuo.php
curl -O https://github.com/AccppK/AKOJ/blob/main/web/admin/yes_jihuo.php
echo "完毕."
