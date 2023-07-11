<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ExportUsers implements FromCollection, WithHeadings
{

    public function collection()
    {
        return User::select('user_id','name','email','mobile')->get();
    }

    public function headings(): array
    {
       return [
       'User Id',
       'Name',
       'Email Id',
       'Phon No'
       ];
    }
}
