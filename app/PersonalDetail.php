<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalDetail extends Model
{

    public function finaldetails(){
        return $this->hasOne(FinalDetail::class,'person_id');
    }

    public function training_tech_knowledges(){

        return $this->hasMany(TrainingTechKnowledge::class,'person_id');
    }

    public function education_qualifications(){

        return $this->hasMany(EducationQualification::class,'person_id');
    }

    public function work_experiences(){

        return $this->hasMany(WorkExperience::class,'person_id');
    }

    public function language_known(){

        return $this->hasMany(LanguageKnown::class,'person_id');
    }

    public function passport_details(){

        return $this->hasOne(Passport::class,'person_id');
    }



    public function interview_comments(){

        return $this->hasOne(InterviewComment::class,'person_id');
    }






}
