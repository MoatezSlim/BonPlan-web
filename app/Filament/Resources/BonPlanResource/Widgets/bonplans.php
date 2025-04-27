<?php

namespace App\Filament\Resources\BonPlanResource\Widgets;

use App\Models\BonPlan;

use App\Models\Menu;
use App\Models\Offre;
use App\Models\Rating;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class bonplans extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('BonPlan numbers  ', BonPlan::count())

                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
                Card::make('offre numbers ', Offre::count())
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('danger'),
                Card::make('Raiting numbers ', Rating::count())
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),

                Card::make('Menu numbers ', Menu::count())

                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('danger'),
                
        ];
    }
}
