<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductImport implements ToModel, WithValidation,  WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $rows = 0;

    public $user_id, $business_id;
    public function __construct($user_id = 0, $business_id =0)
    {
        $this->user_id = $user_id;
        $this->business_id = $business_id;
    }

    public function model(array $row)
    {
        if(!empty($row['image'])){
            $image = 'product/'.$row['image'];
        }else{
            $image = '';
        }
        return new Product([
            'user_id' => $this->user_id,
            'listing_id' => $this->business_id,
            'name' => $row['name'],
            'image' => $image,
            'price' => $row['price'],
        ]);
    }

    public function rules(): array
    {

        return [
                'name' => 'required|max:125',
                'price' => 'required',
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
