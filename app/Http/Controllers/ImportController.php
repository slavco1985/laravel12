<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Imports\ProductImport;
use App\Imports\BusinessImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;

class ImportController extends Controller
{
    public function uploadBulkBusiness(Request $request){
        $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls,txt|max:20000',
        ]);

        $import = new BusinessImport($request->category_id);
        try {
            Excel::import($import, request()->file('file'));
            $count = $import->getRowCount(); 
            $message = $count.' Student Data inserted Successfully!';
            return Redirect::back()->with('success', $message);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            return Redirect::back()->withErrors($failures);
        }

    }

    public function uploadBulkProducts(Request $request){
        $request->validate([
            'business_id' => 'required',
            'file' => 'required|mimes:csv,xlsx,xls,txt|max:20000',
        ]);
        $business = Listing::find($request->business_id);
        $uid = Auth::user()->id;
        $role = Auth::user()->role;

        if($business->user_id || $role == 'admin'){
            $import = new ProductImport($business->user_id, $business->id);
            try {
                Excel::import($import, request()->file('file'));
                $count = $import->getRowCount(); 
                $message = $count.' Student Data inserted Successfully!';
                return Redirect::back()->with('success', $message);
            } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                $failures = $e->failures();
                return Redirect::back()->withErrors($failures);
            }
        }else{
            return abort(404);
        }
        

    }

    public function uploadBulkImages(Request $request){

        $request->validate([
            'image' => 'nullable',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($request->hasfile('image')) {
            foreach($request->file('image') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->storeAs('business', $name, 'public',);
            }
           return back()->with('success', 'File has successfully uploaded!');
        }
       
        if($request->hasfile('resize')) {
           
            foreach($request->file('resize') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->storeAs('business/resize', $name, 'public');
            }
           return back()->with('success', 'File has successfully uploaded!');
        }
    }

    public function bulkProductImage(Request $request){
        $request->validate([
            'image' => 'nullable',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($request->hasfile('image')) {
            foreach($request->file('image') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->storeAs('product', $name, 'public', );
            }
           return back()->with('success', 'File has successfully uploaded!');
        }
    }
}
