@echo ���ִ˴�������
@echo �� Ctrl+C ��������
@copy .\src\data\data.db .\src\data\backup\%date:~0,4%%date:~5,2%%date:~8,2%0%time:~1,1%%time:~3,2%%time:~6,2%.db >nul 2>nul
@echo ���ݿⱸ��Ĭ���� data/backup �ļ��У��粻��Ҫ��ɾ�����ļ���
@echo ��������� 127.0.0.1:808
@cd ./src & ..\bin\php.exe -S127.0.0.1:808 >nul 2>nul