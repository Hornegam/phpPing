@echo off

php C:\xampp\htdocs\phpPing\controller\scriptPing.php
:loop
echo "vai comecar"
php C:\xampp\htdocs\phpPing\controller\scriptPing.php
timeout /t 600 /nobreak > NUL

goto loop