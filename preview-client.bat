@echo off
cd /d "%~dp0"
title Preview Publik Cloudflare - PT. Multi Abadi Aksana
cls
echo ======================================================================
echo    MEMBUAT LINK ONLINE PREVIEW UNTUK KLIEN (CLOUDFLARE TUNNEL)
echo ======================================================================
echo.
echo 1. Pastikan server lokal port 8000 (serve-hp.bat) sedang menyala.
echo 2. Tunggu 5-10 detik sampai muncul kotak link di bawah ini:
echo    "Your quick Tunnel has been created! Visit it at (https://...trycloudflare.com)"
echo.
echo 3. Salin (copy) link https://xxxx.trycloudflare.com tersebut dan kirim ke klien!
echo.
echo PERHATIAN:
echo - JANGAN TUTUP jendela ini selama klien masih mencoba website.
echo - Jika sudah selesai preview, cukup tekan Ctrl+C atau tutup jendela ini.
echo ======================================================================
echo.
.\cloudflared.exe tunnel --url http://127.0.0.1:8000
pause

