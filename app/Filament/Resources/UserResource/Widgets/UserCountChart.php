<?php
namespace App\Filament\Resources\UserResource\Widgets;
use App\Models\User;
use Carbon\Carbon;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class UserCountChart extends ApexChartWidget
{
    protected function getOptions(): array
    {
        // Get the start and end date based on the selected timeframe (e.g., per day or per month)
        $startDate = Carbon::now()->subMonth()->startOfMonth(); // Adjust based on your timeframe
        $endDate = Carbon::now()->endOfMonth(); // Adjust based on your timeframe

        // Fetch the user count data based on the selected timeframe
        $userCounts = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Prepare the data for the chart
        $categories = $userCounts->pluck('date')->toArray();
        $data = $userCounts->pluck('count')->toArray();

        return [
            'chart' => [
                'type' => 'bar',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'User Count',
                    'data' => $data,
                ],
            ],
            'xaxis' => [
                'categories' => $categories,
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'colors' => ['#f59e0b'],
        ];
    }
}
