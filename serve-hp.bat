@echo off
set "PATH=C:\php;%PATH%"
title Server PT. Multi Abadi Aksana (Akses Laptop & HP)
echo ========================================================
echo   Menjalankan Server PT. Multi Abadi Aksana untuk HP
echo ========================================================
echo.
echo Pastikan HP dan Laptop terhubung ke Wi-Fi yang SAMA.
echo.
for /f "tokens=2 delims=:" %%a in ('ipconfig ^| findstr /c:"IPv4 Address"') do (
    for /f "tokens=* delims= " %%b in ("%%a") do set "LOCAL_IP=%%b"
)
if not defined LOCAL_IP set "LOCAL_IP=192.168.1.x"
echo Buka browser di HP Anda lalu ketik:
echo   - Beranda     : http://%LOCAL_IP%:8000
echo   - Panel Admin : http://%LOCAL_IP%:8000/portal-internal-maa-9x7k2v
echo.
echo Buka di Laptop:
echo   - Beranda     : http://127.0.0.1:8000
echo   - Panel Admin : http://127.0.0.1:8000/portal-internal-maa-9x7k2v
echo ========================================================
echo.
if exist "C:\php\php.exe" (
    "C:\php\php.exe" artisan serve --host=0.0.0.0 --port=8000
) else (
    php artisan serve --host=0.0.0.0 --port=8000
)
pause
