<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
	
		public function applicants(){


			return $this->hasOne(Applicant::class,'id','applicant_id');


		}




}
