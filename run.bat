@echo 保持此窗口运行
@echo 按 Ctrl+C 结束程序
@copy .\src\data\data.db .\src\data\backup\%date:~0,4%%date:~5,2%%date:~8,2%0%time:~1,1%%time:~3,2%%time:~6,2%.db >nul 2>nul
@echo 数据库备份默认在 data/backup 文件夹，如不需要请删除该文件夹
@echo 浏览器访问 127.0.0.1:808
@cd ./src & ..\bin\php.exe -S127.0.0.1:808 >nul 2>nul