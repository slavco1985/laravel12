<?php

namespace App\Imports;

use App\Models\Listing;
use Maatwebsite\Excel\Row;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class BusinessImport implements OnEachRow, WithValidation,  WithHeadingRow
{
    private $rows = 0;
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public $category_id;
    // public function __construct($category_id = 0)
    // {
    //     $this->category_id = $category_id;
    // }


    public function onRow(Row $row)
    {
        $role = Auth::user()->role;
        $uid = Auth::user()->id;
        $url = Str::slug($row['business_name']);
        $is = Listing::where('url', $url)->exists();
        if($is){
            $url =  $url.'-'.Str::random(20);
        }
       
       $listing = Listing::create([
            'user_id' => ($role == 'admin') ? $row['user_id'] : $uid,
            'business_name' => $row['business_name'],
            'image' => $row['image'],
            'url' => $url,
            'description' => $row['description'],
            'location_id' => $row['location_id'],
            'email' => $row['email'],
            'website' => $row['website'],
            'mobile' => $row['mobile'],
            'address' => $row['address']
        ]);

        $listing->selected()->create([
            'category_id' => $row['category_id']
        ]);
    }

   
    public function rules(): array
    {

        return [
                'business_name' => 'required|max:125',
                'description' => 'required|min:50',
                'category_id' => 'required',
                'location_id' => 'required',
                'email' => 'required|email',
                'website' => 'required|url',
                'mobile' => 'required',
                'address' => 'required',
            ];
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }
    public function headingRow(): int
    {
        return 1;
    }
}
