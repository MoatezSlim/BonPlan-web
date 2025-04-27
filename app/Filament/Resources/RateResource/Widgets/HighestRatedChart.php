<?php

namespace App\Filament\Resources\RateResource\Widgets;

use Carbon\Carbon;
use App\Models\Rating;
use App\Models\BonPlan;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class HighestRatedChart extends ApexChartWidget
{use HasWidgetShield;
    protected static ?int $sort = 3;
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'highestRatedChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    //protected static ?string $heading = 'HighestRatedChart';

    /**
     * Chart options (series, labels, types, size, animations...)
     *
     * @return array
     */
    protected function getOptions(): array
    {
        // Obtenez les données de tous les bons plans et leur taux respectif
        $bonPlansData = $this->getBonPlansData();
    
        // Utilisez les données pour configurer le graphique
        return [
            'chart' => [
                'type' => 'line', // Changez le type de graphique en "line" pour une courbe
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'Taux (Rate) du Bon Plan', // Nommez la série en fonction de ce qu'elle représente
                    'data' => $bonPlansData['rates'], // Utilisez les données des taux (rates) des bons plans
                ],
            ],
            'xaxis' => [
                'categories' => $bonPlansData['titles'], // Utilisez les titres des bons plans comme catégories
                'title' => [
                    'text' => 'Bons Plans', // Nommez l'axe X
                ],

                
            ],
            'yaxis' => [
                'title' => [
                    'text' => 'Taux (Rate)', // Nommez l'axe Y
                ],
            ],
            'title' => [
                'text' => 'Bons Plans en fonction du Taux (Rate)', // Titre du graphique
                //'align' => 'center', // Alignement du titre (optionnel)
            ],
            

            
            // Ajoutez d'autres options selon vos besoins
        ];
    }
    
    protected function getBonPlansData(): array
    {
        // Obtenez tous les bons plans avec leur taux (rate) respectif
        $bonPlans = BonPlan::with('ratings')->get();
    
        // Initialisez les tableaux pour les données de taux (rates) et les titres
        $rates = [];
        $titles = [];
    
        // Parcourez tous les bons plans pour extraire les données nécessaires
        foreach ($bonPlans as $bonPlan) {
            // Calculer le taux (rate) moyen du bon plan
            $averageRate = $bonPlan->ratings->avg('rate_bp');
    
            // Ajoutez le taux (rate) et le titre du bon plan associé aux tableaux
            $rates[] = $averageRate ?? 0; // Utilisez 0 si aucun taux n'est disponible
            $titles[] = $bonPlan->nom_bp;
        }
    
        // Retournez les données sous forme de tableau associatif
        return [
            'rates' => $rates,
            'titles' => $titles,
        ];
    }
    

}
