<?php

namespace App\Filament\Resources\BonPlanResource\Pages;

use Filament\Pages\Actions;
use App\Exports\RecapPsExport;
use Filament\Pages\Actions\Action;
//use Illuminate\Notifications\Action;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\BonPlanResource;
use App\Filament\Traits\HasDescendingOrder;


class ListBonPlans extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = BonPlanResource::class;
    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make('new'),
            Action::make('export')
            ->button()
            ->action('export'),
            
        ];
        
       
    }
    public function export()
    {
        return Excel::download(new RecapPsExport, 'recapps.xlsx');
    }
    
}
