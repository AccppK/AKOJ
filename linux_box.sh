#!/bin/bash

# 颜色定义
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[0;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# 检查root权限
check_root() {
    if [ "$(id -u)" -ne 0 ]; then
        echo -e "${RED}此操作需要root权限，请使用sudo运行或切换至root用户。${NC}"
        exit 1
    fi
}

# 显示系统信息
system_info() {
    echo -e "\n${GREEN}===== 系统信息 =====${NC}"
    echo -e "主机名: $(hostname)"
    echo -e "操作系统: $(cat /etc/os-release | grep "PRETTY_NAME" | cut -d'"' -f2)"
    echo -e "内核版本: $(uname -r)"
    echo -e "系统时间: $(date)"
    echo -e "运行时间: $(uptime -p)"
    echo -e "CPU信息: $(lscpu | grep "Model name" | sed 's/.*:\s*//')"
    echo -e "内存总量: $(free -h | awk '/Mem/{print $2}')"
    echo -e "当前用户: $(whoami)"
}

# 磁盘使用情况
disk_usage() {
    echo -e "\n${GREEN}===== 磁盘使用情况 =====${NC}"
    df -h
}

# 内存使用情况
memory_usage() {
    echo -e "\n${GREEN}===== 内存使用情况 =====${NC}"
    free -h
}

# CPU使用情况
cpu_usage() {
    echo -e "\n${GREEN}===== CPU使用情况 =====${NC}"
    top -bn1 | grep "Cpu(s)"
}

# 网络信息
network_info() {
    echo -e "\n${GREEN}===== 网络信息 =====${NC}"
    echo -e "IP地址: $(hostname -I)"
    echo -e "公共IP: $(curl -s ifconfig.me)"
    echo -e "\n网络接口:"
    ip -br a
    echo -e "\n路由表:"
    ip route
}

# 列出大文件
list_large_files() {
    echo -e "\n${GREEN}===== 查找大文件 (>50MB) =====${NC}"
    read -p "请输入要搜索的目录 (默认为/): " directory
    directory=${directory:-/}
    find "$directory" -type f -size +50M -exec du -h {} + 2>/dev/null | sort -rh | head -n 20
}

# 清理缓存
clean_cache() {
    check_root
    echo -e "\n${GREEN}===== 清理系统缓存 =====${NC}"
    echo "当前缓存:"
    free -h
    echo -e "\n清理中..."
    sync
    echo 3 > /proc/sys/vm/drop_caches
    echo "清理后缓存:"
    free -h
}

# 查找文件
find_file() {
    echo -e "\n${GREEN}===== 查找文件 =====${NC}"
    read -p "请输入要查找的文件名: " filename
    read -p "请输入搜索目录 (默认为/): " directory
    directory=${directory:-/}
    echo -e "\n搜索结果:"
    find "$directory" -name "$filename" 2>/dev/null
}

# 进程管理
process_management() {
    echo -e "\n${GREEN}===== 进程管理 =====${NC}"
    echo "1. 查看所有进程"
    echo "2. 查找进程"
    echo "3. 结束进程"
    read -p "请选择操作 [1-3]: " choice
    
    case $choice in
        1)
            ps aux
            ;;
        2)
            read -p "请输入进程名: " process
            ps aux | grep "$process"
            ;;
        3)
            read -p "请输入要结束的进程PID: " pid
            kill -9 "$pid"
            if [ $? -eq 0 ]; then
                echo -e "${GREEN}进程 $pid 已结束。${NC}"
            else
                echo -e "${RED}结束进程失败。${NC}"
            fi
            ;;
        *)
            echo -e "${RED}无效选择。${NC}"
            ;;
    esac
}

# 用户管理
user_management() {
    check_root
    echo -e "\n${GREEN}===== 用户管理 =====${NC}"
    echo "1. 列出所有用户"
    echo "2. 添加用户"
    echo "3. 删除用户"
    echo "4. 修改用户密码"
    read -p "请选择操作 [1-4]: " choice
    
    case $choice in
        1)
            cut -d: -f1 /etc/passwd
            ;;
        2)
            read -p "请输入用户名: " username
            useradd "$username"
            passwd "$username"
            ;;
        3)
            read -p "请输入要删除的用户名: " username
            userdel -r "$username"
            ;;
        4)
            read -p "请输入用户名: " username
            passwd "$username"
            ;;
        *)
            echo -e "${RED}无效选择。${NC}"
            ;;
    esac
}

# 服务管理
service_management() {
    check_root
    echo -e "\n${GREEN}===== 服务管理 =====${NC}"
    echo "1. 列出所有服务"
    echo "2. 启动服务"
    echo "3. 停止服务"
    echo "4. 重启服务"
    echo "5. 查看服务状态"
    read -p "请选择操作 [1-5]: " choice
    
    case $choice in
        1)
            systemctl list-unit-files --type=service
            ;;
        2)
            read -p "请输入服务名: " service
            systemctl start "$service"
            ;;
        3)
            read -p "请输入服务名: " service
            systemctl stop "$service"
            ;;
        4)
            read -p "请输入服务名: " service
            systemctl restart "$service"
            ;;
        5)
            read -p "请输入服务名: " service
            systemctl status "$service"
            ;;
        *)
            echo -e "${RED}无效选择。${NC}"
            ;;
    esac
}

# 防火墙管理
firewall_management() {
    check_root
    echo -e "\n${GREEN}===== 防火墙管理 =====${NC}"
    echo "1. 查看防火墙状态"
    echo "2. 开放端口"
    echo "3. 关闭端口"
    echo "4. 列出所有规则"
    read -p "请选择操作 [1-4]: " choice
    
    case $choice in
        1)
            ufw status verbose
            ;;
        2)
            read -p "请输入要开放的端口号: " port
            ufw allow "$port"
            ;;
        3)
            read -p "请输入要关闭的端口号: " port
            ufw deny "$port"
            ;;
        4)
            ufw status numbered
            ;;
        *)
            echo -e "${RED}无效选择。${NC}"
            ;;
    esac
}

# 备份目录
backup_directory() {
    echo -e "\n${GREEN}===== 备份目录 =====${NC}"
    read -p "请输入要备份的目录路径: " source_dir
    read -p "请输入备份保存路径: " backup_dir
    read -p "请输入备份文件名 (不带扩展名): " backup_name
    
    if [ ! -d "$source_dir" ]; then
        echo -e "${RED}源目录不存在！${NC}"
        return
    fi
    
    if [ ! -d "$backup_dir" ]; then
        mkdir -p "$backup_dir"
    fi
    
    timestamp=$(date +%Y%m%d_%H%M%S)
    backup_file="$backup_dir/$backup_name-$timestamp.tar.gz"
    
    echo "正在备份 $source_dir 到 $backup_file ..."
    tar -czf "$backup_file" "$source_dir"
    
    if [ $? -eq 0 ]; then
        echo -e "${GREEN}备份成功完成。${NC}"
        echo "备份文件大小: $(du -h "$backup_file" | cut -f1)"
    else
        echo -e "${RED}备份失败！${NC}"
    fi
}

# 显示菜单
show_menu() {
    clear
    echo -e "${BLUE}"
    echo "  _      _   _ _____  _   _ _____ ____  "
    echo " | |    | | | |_   _|| | | |_   _|  _ \ "
    echo " | |    | | | | | |  | | | | | | | |_) |"
    echo " | |____| |_| | | |  | |_| | | | |  __/ "
    echo " |______|\___/  |_|   \___/  |_| |_|    "
    echo -e "${NC}"
    echo -e "${YELLOW}===== Linux 工具箱 =====${NC}"
    echo "1. 显示系统信息"
    echo "2. 显示磁盘使用情况"
    echo "3. 显示内存使用情况"
    echo "4. 显示CPU使用情况"
    echo "5. 显示网络信息"
    echo "6. 查找大文件"
    echo "7. 清理系统缓存"
    echo "8. 查找文件"
    echo "9. 进程管理"
    echo "10. 用户管理"
    echo "11. 服务管理"
    echo "12. 防火墙管理"
    echo "13. 备份目录"
    echo "0. 退出"
}

# 主循环
while true; do
    show_menu
    read -p "请输入选项 [0-13]: " choice
    
    case $choice in
        1) system_info ;;
        2) disk_usage ;;
        3) memory_usage ;;
        4) cpu_usage ;;
        5) network_info ;;
        6) list_large_files ;;
        7) clean_cache ;;
        8) find_file ;;
        9) process_management ;;
        10) user_management ;;
        11) service_management ;;
        12) firewall_management ;;
        13) backup_directory ;;
        0)
            echo -e "${GREEN}感谢使用Linux工具箱，再见！${NC}"
            exit 0
            ;;
        *)
            echo -e "${RED}无效选项，请重新输入！${NC}"
            ;;
    esac
    
    read -p "按回车键继续..."
done
