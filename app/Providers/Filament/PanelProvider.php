<?php

namespace App\Providers\Filament;

use Filament\Pages;

use Filament\Panel;
use App\Models\User;
use Filament\Widgets;
use App\Filament\Pages\Auth\Register;
use App\Filament\Resources\BonPlanResource\Widgets\bonplans;
use Filament\Support\Colors\Color;
use App\Models\Traits\FilamentTrait;
use Illuminate\Support\Facades\Auth;
use App\Providers\AuthServiceProvider;
use Filament\Forms\Components\FileUpload;
use Filament\Http\Middleware\Authenticate;

use Jeffgreco13\FilamentBreezy\BreezyCore;
use App\Providers\Filament\AccountSettingsPage;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

use Saade\FilamentFullCalendar\FilamentFullCalendarPlugin;
use Leandrocfe\FilamentApexCharts\FilamentApexChartsPlugin;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use App\Filament\Resources\UserResource\Widgets\UserCountChart;
use App\Filament\Resources\RateResource\Widgets\HighestRatedChart;
use App\Filament\Resources\BonPlanResource\Widgets\BonPlansPerDayChart;
use App\Filament\Resources\GrilleTarifaireCResource\Widgets\sousmenuss;

class PanelProvider extends \Filament\PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        $widgets = [ 
           // Widgets\AccountWidget::class,
           // FilamentFullCalendarPlugin::make(),
           
        
        ];
        
        // Ajoute le widget UserCountChart uniquement si l'utilisateur est un super administrateur
        if (auth()->check() && auth()->user()->isSuperAdmin()) {
            $widgets[] = UserCountChart::make();
        }
        
        return $panel

        ->plugin(FilamentFullCalendarPlugin::make()
       
                    ->selectable()
                    ->editable()
                   // ->config()
                  
                    
        )
        // Autres configurations...
        ->widgets([
          
            bonplans::class,
            
            Widgets\AccountWidget::class,
           
            HighestRatedChart::make(),
            BonPlansPerDayChart::make(),
            // Autres widgets...
        ])

       
       // ->widgets($widgets)
        
       ->homeUrl(fn() => auth()->check() && auth()->user() instanceof User && auth()->user()->isSuperAdmin() || auth()->user()->hasRole('partenaire') ? 'bonplans/c/' . auth()->user()->id : 'bonplans/sh/' . auth()->user()->id)
           
            ->brandLogo(asset('storage/images/bon.jpg'))
           
            
            ->plugin(FilamentApexChartsPlugin::make())
           
            ->plugin(
                BreezyCore::make()
                ->avatarUploadComponent(fn($fileUpload) => $fileUpload->disableLabel())
                ->myProfile(
                    shouldRegisterUserMenu: true,
                    shouldRegisterNavigation: false,
                    navigationGroup: 'Settings',
                    hasAvatars: true,
                    slug: 'my-profile'
                )
            )
            ->default()
            ->id('admin')
            ->path('/')
            ->login()
            ->registration()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->discoverResources(in: app_path('Filament/Resources/bon-plans.index'), for: 'App\\Filament\\Resources')
            ->discoverResources(in: app_path('Filament/Resources/bon-plans.create'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
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
            ])->plugins([
                \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make()
            ]);
    }
}
