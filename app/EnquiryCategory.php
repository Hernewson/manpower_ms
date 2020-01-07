<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnquiryCategory extends Model
{
    protected $fillable=['cat_name','cat_companyName','status','slug','cat_expiryDate','cat_vacancies','cat_countries','cat_lotNumber','cat_approvalDate'];


    public function getValidationRules(){
        return [
            'cat_name'=>'required|string',
            'status'=>'nullable|in:1',
        ];
    }

    public function enquiries(){
        return $this->belongsToMany(Enquiry::class, 'enquiries_enquiry_categories');
    }
}
