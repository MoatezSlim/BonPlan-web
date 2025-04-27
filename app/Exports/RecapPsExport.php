<?php

namespace App\Exports;

use App\Models\BonPlan;
use App\Models\RecapP;
use Maatwebsite\Excel\Concerns\FromCollection;

class RecapPsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BonPlan::all();
    }
}
