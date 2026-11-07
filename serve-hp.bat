@echo off
set "PATH=C:\php;%PATH%"
title Server PT. Multi Abadi Aksana (Akses Laptop & HP)
echo ========================================================
echo   Menjalankan Server PT. Multi Abadi Aksana untuk HP
echo ========================================================
echo.
echo Pastikan HP dan Laptop terhubung ke Wi-Fi yang SAMA.
echo.
echo Buka browser di HP Anda lalu ketik:
echo   - Beranda:      http://192.168.100.13:8000
echo   - Panel Admin:  http://192.168.100.13:8000/portal-internal-maa-9x7k2v
echo.
echo Buka di Laptop:
echo   - Beranda:      http://127.0.0.1:8000
echo ========================================================
echo.
if exist "C:\php\php.exe" (
    "C:\php\php.exe" artisan serve --host=0.0.0.0 --port=8000
) else (
    php artisan serve --host=0.0.0.0 --port=8000
)
pause
