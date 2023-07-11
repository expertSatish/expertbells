<?php

namespace App\Exports;

use App\Models\Expert;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ExpertExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return Expert::select('user_id','name','email','mobile')->get();
    }

    public function headings(): array
    {
       return [
       'Expert Id',
       'Name',
       'Email Id',
       'Phone No',
       ];
    }
}
