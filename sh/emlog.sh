echo "本脚本仅适用于为Hust OJ(华中科技大学判题系统)提供的便携式emlog for Hust OJ脚本，并不适用于裸机或其他机器，如需其他机器部署，请参考emlog.net"
cd /home/judge/src/web/
curl -O https://raw.githubusercontent.com/AccppK/AKOJ/refs/heads/main/emlog_pro_2.5.16.zip
mv emlog_pro_2.5.16.zip blog.zip
mkdir blog
cd blog
unzip ../blog.zip
#!/bin/bash
ls
# 提示用户输入一个字符
echo "请输入刚才是否有文件夹的输出 (Y/n):"
read input

# 判断输入的字符是否为 "Y" 或 "n"
if [ "$input" == "Y" ]; then
    #继续
    #!/bin/bash

# 数据库连接信息
DB_HOST="localhost"
DB_USER="root"

# 新建的数据库名称
NEW_DB_NAME="blog"

# 创建数据库的SQL命令
CREATE_DB_SQL="CREATE DATABASE IF NOT EXISTS $NEW_DB_NAME;"

# 执行SQL命令
mysql -h $DB_HOST -u $DB_USER -e "$CREATE_DB_SQL"

echo "Database '$NEW_DB_NAME' created successfully."
#!/bin/bash

# 数据库连接信息
DB_HOST="localhost"
DB_USER="root"

# 新建的用户名和密码
NEW_USER="blog"
NEW_USER_PASSWORD="djoieknwqoikj01930idkoi"

# 要授予权限的数据库名称
DATABASE_NAME="blog"

# 创建数据库的SQL命令
CREATE_DB_SQL="CREATE DATABASE IF NOT EXISTS $DATABASE_NAME;"

# 创建用户的SQL命令
CREATE_USER_SQL="CREATE USER '$NEW_USER'@'$DB_HOST' IDENTIFIED BY '$NEW_USER_PASSWORD';"

# 授权用户的SQL命令
GRANT_PRIVILEGES_SQL="GRANT ALL PRIVILEGES ON $DATABASE_NAME.* TO '$NEW_USER'@'$DB_HOST'; FLUSH PRIVILEGES;"

# 执行SQL命令
mysql -h $DB_HOST -u $DB_USER -e "$CREATE_DB_SQL"
mysql -h $DB_HOST -u $DB_USER -e "$CREATE_USER_SQL"
mysql -h $DB_HOST -u $DB_USER -e "$GRANT_PRIVILEGES_SQL"

echo "Database '$DATABASE_NAME' created successfully."
echo "User '$NEW_USER' created and granted all privileges on database '$DATABASE_NAME'."


mysql -u root -e "SQL_COMMAND"
#继续执行SH
chmod 770 config.php
chmod 770 content/cache
echo "您的插件已经安装完成。/n
您可以访问http://您的ip或域名/blog来访问您最新的Emlog for Hust OJ/n
第一次登录时，请填写您的相关信息，脚本已帮您准备好。\n
其他保持默认，仅部分需自行填写。\n
数据库名:blog\n
数据库用户:blog\n
数据库密码:djoieknwqoikj01930idkoi\n
数据库密码均为统一，较不安全，请及时更换您的数据库密码。\n
脚本由AKOJ(www.akoj.top)开发者制作，如有问题请联系169711625。\n
感谢使用！Bye!
"
elif [ "$input" == "n" ]; then
    echo "您的系统可能不适用于EMLOG插件，请联系169711625获取帮助。"
    exit;
else
    echo "输入无效，请输入 Y 或 n。"
fi



