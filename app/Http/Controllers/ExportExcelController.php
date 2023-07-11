<?php

namespace App\Http\Controllers;

use App\Exports\ExpertExport;
use App\Exports\ExportUsers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class ExportExcelController extends Controller
{
    public function user_export() 
    {
        return Excel::download(new ExportUsers, 'User.xlsx');
    }
    public function expert_export() 
    {
        return Excel::download(new ExpertExport, 'Expert.xlsx');
    }
}
