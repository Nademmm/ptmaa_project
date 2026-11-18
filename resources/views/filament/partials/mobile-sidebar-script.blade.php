<script>
    (() => {
        if (window.__ptmaaAdminMobileSidebarReady) {
            return;
        }
        window.__ptmaaAdminMobileSidebarReady = true;

        const mobileMedia = window.matchMedia('(max-width: 1023.98px)');
        let lastTouchY = null;
        let lastTouchX = null;

        const getSidebarStore = () => window.Alpine?.store?.('sidebar');
        const isMobileDrawerOpen = () => mobileMedia.matches && Boolean(getSidebarStore()?.isOpen);

        const ensureCloseButton = () => {
            const header = document.querySelector('.fi-main-sidebar .fi-sidebar-header');
            if (!header || header.querySelector('.fi-mobile-sidebar-close')) {
                return;
            }

            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'fi-mobile-sidebar-close';
            btn.setAttribute('aria-label', 'Tutup menu navigasi');
            btn.setAttribute('title', 'Tutup menu');
            btn.innerHTML =
                '<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 1.25rem; height: 1.25rem;"><path d="M6 18 18 6M6 6l12 12"/></svg>';

            btn.addEventListener('click', () => {
                getSidebarStore()?.close();
                requestAnimationFrame(() => {
                    document.querySelector('.fi-topbar-open-sidebar-btn')?.focus({ preventScroll: true });
                });
            });

            header.appendChild(btn);
        };

        const syncDrawerModality = (isOpen) => {
            const active = mobileMedia.matches && Boolean(isOpen);
            const sidebar = document.querySelector('.fi-main-sidebar');
            const mainCtn = document.querySelector('.fi-main-ctn');

            if (sidebar) {
                if (active) {
                    sidebar.setAttribute('role', 'dialog');
                    sidebar.setAttribute('aria-modal', 'true');
                    sidebar.setAttribute('aria-label', 'Navigasi admin');
                } else {
                    sidebar.removeAttribute('role');
                    sidebar.removeAttribute('aria-modal');
                    sidebar.removeAttribute('aria-label');
                }
            }

            if (mainCtn) {
                mainCtn.inert = active;
            }
        };

        const shouldBlockScroll = (target, deltaY) => {
            const nav = target instanceof Element ? target.closest('.fi-main-sidebar .fi-sidebar-nav') : null;
            if (!nav) {
                return true;
            }

            const maxScroll = nav.scrollHeight - nav.clientHeight;
            if (maxScroll <= 1) {
                return true;
            }

            if (deltaY < 0 && nav.scrollTop <= 0) {
                return true;
            }

            if (deltaY > 0 && nav.scrollTop >= maxScroll - 1) {
                return true;
            }

            return false;
        };

        document.addEventListener('touchstart', (e) => {
            if (e.touches.length !== 1) {
                lastTouchY = null;
                lastTouchX = null;
                return;
            }
            lastTouchY = e.touches[0].clientY;
            lastTouchX = e.touches[0].clientX;
        }, { passive: true });

        document.addEventListener('touchmove', (e) => {
            if (!isMobileDrawerOpen() || e.touches.length !== 1 || lastTouchY === null) {
                return;
            }

            const currentY = e.touches[0].clientY;
            const currentX = e.touches[0].clientX;
            const deltaY = lastTouchY - currentY;
            const deltaX = (lastTouchX ?? currentX) - currentX;
            lastTouchY = currentY;
            lastTouchX = currentX;

            if (Math.abs(deltaX) > Math.abs(deltaY) && !(e.target instanceof Element && e.target.closest('.fi-main-sidebar'))) {
                if (e.cancelable) {
                    e.preventDefault();
                }
                return;
            }

            if (shouldBlockScroll(e.target, deltaY) && e.cancelable) {
                e.preventDefault();
            }
        }, { passive: false });

        document.addEventListener('wheel', (e) => {
            if (!isMobileDrawerOpen()) {
                return;
            }

            if (shouldBlockScroll(e.target, e.deltaY) && e.cancelable) {
                e.preventDefault();
            }
        }, { passive: false });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && isMobileDrawerOpen()) {
                e.preventDefault();
                getSidebarStore()?.close();
                requestAnimationFrame(() => {
                    document.querySelector('.fi-topbar-open-sidebar-btn')?.focus({ preventScroll: true });
                });
            }
        });

        document.addEventListener('click', (e) => {
            const openBtn = e.target instanceof Element ? e.target.closest('.fi-topbar-open-sidebar-btn') : null;
            if (!openBtn || !mobileMedia.matches) {
                return;
            }
            requestAnimationFrame(() => {
                document.querySelector('.fi-mobile-sidebar-close')?.focus({ preventScroll: true });
            });
        });

        const initIntegration = () => {
            ensureCloseButton();
            const store = getSidebarStore();
            if (!store) {
                return;
            }

            if (!window.__ptmaaMobileSidebarEffect && window.Alpine?.effect) {
                window.__ptmaaMobileSidebarEffect = true;
                window.Alpine.effect(() => {
                    syncDrawerModality(getSidebarStore()?.isOpen);
                });
            } else {
                syncDrawerModality(store.isOpen);
            }
        };

        mobileMedia.addEventListener('change', () => {
            syncDrawerModality(getSidebarStore()?.isOpen);
        });

        document.addEventListener('alpine:initialized', initIntegration);
        document.addEventListener('DOMContentLoaded', initIntegration);
        document.addEventListener('livewire:navigated', initIntegration);

        if (window.Alpine?.store?.('sidebar')) {
            initIntegration();
        }
    })();
</script>
