<?php

namespace App\Exports;

use App\Models\Listing;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;


class BusinessExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    
    protected $request, $uid;


    public function __construct($request, $uid = 0)
    {
       
        $this->request = $request;
        $this->uid = $uid;
    }


    public function collection()
    {
        $query = Listing::query();
        if(!empty($this->uid)){
            $query->where('user_id', $this->uid);
        }

        if(!empty($this->request->fcat)){
            $query = $query->whereRelation('selected', 'category_id', $this->request->fcat);
        }
        if(!empty($this->request->frating)){
            $query->whereBetween('rating', [$this->request->frating.'.1', $this->request->frating.'.9']);
        }
        if(!empty($this->request->fcity)){
            $query->where('location_id', $this->request->fcity);
        }
        if(!empty($this->request->fkey)){
            $query->where('business_name', 'like', $this->request->fkey.'%');
        }
        //$query->orderBy('id', 'desc');
        return $query->get()->map(function ($list) {
            return [
                'id' => $list->id,
                'business_name' => $list->business_name,
                'url' => $list->url,
                'image' => $list->resize,
                'email' => $list->email,
                'city' => $list->city->name,
                'user' => $list->user->name,
                'rating' => $list->rating,
                'plan' => ($list->user->plan) ? $list->user->plan->package->name : '',
                'featured' => $list->featured
            ];
        });
        
    }

    public function headings(): array
    {
        return ["ID", "Business Name", "URL", "Image Path", "Email", "City", "Posted By", "Rating", "Current Plan", "Is Features"];
    }
}
