<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\HtmlString;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->profile()
            ->darkMode(false)
            ->font('Plus Jakarta Sans')
            ->brandName('PT. Multi Abadi Aksana')
            ->brandLogo(fn (): HtmlString => new HtmlString('
                <div class="flex items-center gap-2.5 h-full">
                    <img
                        src="/assets/logo.jpg"
                        alt="Logo PT. Multi Abadi Aksana"
                        style="height: 2.25rem; width: auto; object-fit: contain; flex-shrink: 0;"
                    />
                    <div class="flex flex-col text-left leading-none">
                        <span style="font-size: 0.9rem; font-weight: 900; letter-spacing: -0.025em; color: #1B1B6C; text-transform: uppercase; line-height: 1.1;">
                            MULTI ABADI <span style="color: #5C6BC0;">AKSANA</span>
                        </span>
                        <span style="font-size: 0.54rem; font-weight: 800; letter-spacing: 0.14em; color: #64748B; text-transform: uppercase; margin-top: 2px;">
                            General Trading &amp; Contractor
                        </span>
                    </div>
                </div>
            '))
            ->brandLogoHeight('2.5rem')
            ->favicon('/assets/logo.jpg')
            ->sidebarCollapsibleOnDesktop()
            ->maxContentWidth('7xl')
            ->colors([
                'primary' => Color::hex('#1B1B6C'),
                'gray' => Color::Slate,
                'info' => Color::Sky,
                'success' => Color::Emerald,
                'warning' => Color::Amber,
                'danger' => Color::Rose,
            ])
            ->renderHook(
                PanelsRenderHook::HEAD_END,
                fn (): HtmlString => new HtmlString('
                    <style>
                        /* Minimalist Corporate Admin UI — PT. Multi Abadi Aksana */
                        body.fi-body {
                            background-color: #F8FAFC !important;
                            color: #0F172A;
                            -webkit-font-smoothing: antialiased;
                        }
                        .fi-sidebar {
                            background-color: #FFFFFF !important;
                            border-right: 1px solid rgba(27, 27, 108, 0.08) !important;
                        }
                        .fi-sidebar-header {
                            border-bottom: 1px solid rgba(27, 27, 108, 0.06) !important;
                        }
                        .fi-topbar nav {
                            background-color: rgba(255, 255, 255, 0.92) !important;
                            backdrop-filter: blur(12px);
                            border-bottom: 1px solid rgba(27, 27, 108, 0.08) !important;
                            box-shadow: none !important;
                        }
                        .fi-section,
                        .fi-ta-ctn,
                        .fi-wi-stats-overview-stat,
                        .fi-fo-tabs {
                            border-radius: 1rem !important;
                            border: 1px solid rgba(27, 27, 108, 0.08) !important;
                            box-shadow: 0 1px 3px 0 rgba(15, 23, 42, 0.03) !important;
                            background-color: #FFFFFF !important;
                        }
                        .fi-section-header {
                            padding: 1.125rem 1.5rem !important;
                        }
                        .fi-sidebar-item-active > a {
                            background-color: rgba(27, 27, 108, 0.07) !important;
                            color: #1B1B6C !important;
                            font-weight: 700 !important;
                        }
                        .fi-btn {
                            border-radius: 0.75rem !important;
                            font-weight: 600 !important;
                            letter-spacing: 0.01em;
                        }
                        .fi-input-wrp {
                            border-radius: 0.75rem !important;
                        }
                        .fi-simple-main {
                            border-radius: 1.25rem !important;
                            border: 1px solid rgba(27, 27, 108, 0.1) !important;
                            box-shadow: 0 20px 40px -15px rgba(27, 27, 108, 0.08) !important;
                        }
                    </style>
                ')
            )
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('Katalog & Divisi Bisnis'),
                NavigationGroup::make()
                    ->label('Portofolio & Publikasi'),
                NavigationGroup::make()
                    ->label('CRM & Interaksi Klien'),
                NavigationGroup::make()
                    ->label('Pengaturan & Administrasi'),
            ])
            ->navigationItems([
                NavigationItem::make('Lihat Website Publik')
                    ->url('/', shouldOpenInNewTab: true)
                    ->icon('heroicon-o-globe-alt')
                    ->group('Pengaturan & Administrasi')
                    ->sort(99),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
