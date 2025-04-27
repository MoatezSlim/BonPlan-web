<?php

namespace App\Filament\Resources\BonPlanResource\Widgets;

use Carbon\Carbon;
use App\Models\Rating;
use App\Models\BonPlan;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class BonPlansPerDayChart extends ApexChartWidget
{ use HasWidgetShield;
    protected static ?int $sort = 3;
    
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'bonPlansPerDayChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
   // protected static ?string $heading = 'Nombre de Bons Plans par Jour';

    /**
     * Chart options (series, labels, types, size, animations...)
     *
     * @return array
     */
    protected function getOptions(): array
    {
        // Obtenez les données du nombre de bons plans par jour
        $bonPlansPerDayData = $this->getBonPlansPerDayData();

        // Utilisez les données pour configurer le graphique
        return [
            'chart' => [
                'type' => 'bar', // Type de graphique en "bar" pour les barres
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'Nombre de Bons Plans',
                    'data' => $bonPlansPerDayData['counts'],
                ],
            ],
            'xaxis' => [
                'categories' => $bonPlansPerDayData['dates'],
                'title' => [
                    'text' => 'Date',
                ],
            ],
            'yaxis' => [
                'title' => [
                    'text' => 'Nombre de Bons Plans',
                ],
            ],
            'title' => [
                'text' => 'Nombre de Bons Plans par Jour',
                'align' => 'center',
                'style' => [
                    'fontSize' => '14px',
                ],
            ],
        ];
    }

    /**
     * Get data for the number of bon plans per day
     *
     * @return array
     */
    protected function getBonPlansPerDayData(): array
    {
        // Obtenez les données du nombre de bons plans par jour
        $bonPlansPerDay = BonPlan::query()
            ->selectRaw('DATE(created_at) as date, count(*) as count')
            ->groupBy('date')
            ->get();

        // Initialisez les tableaux pour les données de compte et les dates
        $counts = [];
        $dates = [];

        // Parcourez les données pour extraire les comptes et les dates
        foreach ($bonPlansPerDay as $bonPlanPerDay) {
            $counts[] = $bonPlanPerDay->count;
            $dates[] = $bonPlanPerDay->date;
        }

        // Retournez les données sous forme de tableau associatif
        return [
            'counts' => $counts,
            'dates' => $dates,
        ];
    }
}