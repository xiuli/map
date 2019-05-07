#!/bin/bash
echo "初始化中....."
git add -A;
read -p "输入日志,按Enter键跳过 :" log
if  [ ! -n "$log" ] ;then
    git commit -m "vue";
else git commit -m "${log}";
fi;
#git pull;
git push ;
echo "推送完成"