<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Exports\BusinessExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function businessExcelDownload(Request $request){ 
        $export = new BusinessExport($request, 0);
        return Excel::download($export, 'business_list.xlsx');
    }

    public function exportUserData(){
        $uid = Auth::user()->id;
        if(!empty($uid)){
            $export = new BusinessExport([], $uid);
            return Excel::download($export, 'business_list.xlsx');
        }
       
    }
}
