<?php
namespace App\Http\Controllers;



use App\Course;
use App\FinalDetail;
use App\Student;
use App\Fee;
use App\Manpower;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EducationQualification;
use App\WorkExperience;
use PDF;

use App\LanguageKnown;
use App\Passport;
use App\TrainingTechKnowledge;
use App\InterviewComment;
use Illuminate\Support\Str;
use Svg\Tag\Image;
use Illuminate\Support\Facades\Input;

class ManpowerController extends Controller
{
    public function manpowerform(Request $request) {
        $services=Course::latest()->get();

        if($request->isMethod('post'))
        {

                $request->validate([
                    'name' => 'required|string|max:50',

                    'qualification'=>'required',
                    'name_company'=>'required',
                    'language'=>'required',
                    'passport-no' => 'required',
                    'image' => 'mimes:jpg,png,jpeg',
                ]);

            $data = $request->all();
            $personal_detail=new Student;
            $personal_detail->name = $data['name'];
            $personal_detail->father_name = $data['father_name'];
            $personal_detail->mother_name = $data['mother_name'];
            $personal_detail->permanent_address = $data['permanent_address'];
            $personal_detail->temporary_address = $data['temporary_address'];
            $personal_detail->phone = $data['phone'];
            $personal_detail->height = $data['height'];
            $personal_detail->weight = $data['weight'];
            $personal_detail->maritial_status = $data['maritial_status'];
            $personal_detail->contact_no = $data['contact_number'];
            $personal_detail->nationality = $data['nationality'];
            $personal_detail->next_of_kin = $data['next_of_kin'];



            if(($request->prof_img != null)){
                $personal_detail->prof_img = $request->file('prof_img')->store('Profile','public');
            }





            $course=$data['course_id'];

            $total=0;

            foreach ($course as $value) {
                $coursefee=Course::where('id',$value)->first();
                $total=$total+$coursefee->fees;

            }
            $personal_detail->due=$total;

            $personal_detail->save();


            $course_id=$data['course_id'];

            // dd($section_id);
            $personal_detail->courses()->attach($course_id);




            if($personal_detail->save()){
                $fees  = new Fee;
                $fees->student_id = DB::getPdo()->lastInsertId();
                $fees->title = "Admission Fee";
                $fees->amount= $total;
                $fees->save();
            }

            $personsid= DB::getPdo()->lastInsertId();


            $final_detail = new FinalDetail;
            $final_detail->person_id=$personsid;
            $final_detail->position_applied= $data["position_applied"];
            $final_detail->reference_person=$data["reference_person"];
            $final_detail->ref_contact=$data["ref_contact"];
            $final_detail->country=$data["country"];
            $final_detail->save();



            $count=0;
            foreach ($data["qualification"] as $value){
                $count=$count+1;

            };


            for($i=0;$i<$count;++$i){
                $education_qual = new EducationQualification() ;
                $education_qual->person_id=$personsid;
                $education_qual->qualification_id=$data['qualification'][$i];
                $education_qual->name_of_course=$data['courses'][$i];
                $education_qual->name_of_institute=$data['institute'][$i];
                $education_qual->year=$data['qualification_year'][$i];
                $education_qual->save();
            };


            $count1=0;
            foreach ($data["name_company"] as $value){
                $count1=$count1+1;
            };

            for($i=0;$i<$count1;++$i){
                $workexperience = new WorkExperience() ;
                $workexperience->person_id=$personsid;
                $workexperience->name_of_company=$data['name_company'][$i];
                $workexperience->position_held=$data['position_held'][$i];
                $workexperience->from=$data['date_from'][$i];
                $workexperience->to=$data['date_to'][$i];
                $workexperience->reason_for_leaving=$data['reason_for_leave'][$i];
                $workexperience->save();
            };



            $count2=0;
            foreach ($data["language"] as $value){
                $count2=$count2+1;
            };

            for($i=0;$i<$count2;++$i){
                $languageknown = new LanguageKnown ;
                $languageknown->person_id=$personsid;
                $languageknown->language=$data['language'][$i];
                $languageknown->speaking=$data['speak'][$i];
                $languageknown->reading=$data['read'][$i];
                $languageknown->writing=$data['write'][$i];
                $languageknown->save();
            };

            $count3=0;
            foreach ($data["knowledge_description"] as $value){
                $count3=$count3+1;
            };

            for($i=0;$i<$count3;++$i){
                $knowledge_description = new TrainingTechKnowledge ;
                $knowledge_description->person_id=$personsid;
                $knowledge_description->knowledge=$data['knowledge_description'][$i];
                $knowledge_description->save();
            };


            $passport_detail= new Passport;
            $passport_detail->person_id=$personsid;
            $passport_detail->passport_no=$data['passport-no'];
            $passport_detail->issue_date=$data['issue_date'];
            $passport_detail->expiry_date=$data['expiry_date'];
            $passport_detail->issue_place=$data['issue_place'];
            $passport_detail->birth_place=$data['birth_place'];
            $passport_detail->birth_date=$data['birth_date'];
            $passport_detail->age=$data['age'];

            if(($request->doc_img != null)){
                $passport_detail->image = $request->file('doc_img')->store('Documents','public');
            }
            $passport_detail->save();

            return redirect()->route('viewmanpowerlist')->with('flash_message', 'Personnel Details Has Been Added');
        }
        return view('admin.Manpower.add',compact('services'));
    }

    public function viewmanpowerlist(){
        $personnel=Student::with('finaldetails')->get();
//        dd($personnel);
        return view('admin.Manpower.list',compact('personnel'));

    }

    public function manpoweredit(Request $request,$id){
        $services=Course::latest()->get();
        $personnel=Student::where('id',$id)->with('finaldetails','training_tech_knowledges','education_qualifications','work_experiences','language_known','passport_details','interview_comments')->first();

        $course_student = $personnel->courses()->pluck('course_id')->toArray();
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $personal_detail=Student::findOrfail($id);
            $personal_detail->name = $data['name'];
            $personal_detail->father_name = $data['father_name'];
            $personal_detail->mother_name = $data['mother_name'];
            $personal_detail->permanent_address = $data['permanent_address'];
            $personal_detail->temporary_address = $data['temporary_address'];
            $personal_detail->phone = $data['phone'];
            $personal_detail->height = $data['height'];
            $personal_detail->weight = $data['weight'];
            $personal_detail->maritial_status = $data['maritial_status'];
            $personal_detail->contact_no = $data['contact_number'];
            $personal_detail->nationality = $data['nationality'];
            $personal_detail->next_of_kin = $data['next_of_kin'];


            if(($request->prof_img != null)){
                $personal_detail->prof_img = $request->file('prof_img')->store('Profile','public');
            }

            $personal_detail->save();
            $course_id=$data['course_id'];
            $personal_detail->courses()->sync($course_id);



            $final_detail =FinalDetail::where('person_id',$id)->first();
            $final_detail->position_applied= $data["position_applied"];
            $final_detail->reference_person=$data["reference_person"];
            $final_detail->ref_contact=$data["ref_contact"];
            $final_detail->country=$data["country"];
            $final_detail->save();



            //            ================================================Education Qualification =============================

            $count=0;
            foreach ($data["qualification"] as $value){
                $count=$count+1;
            };
            $education_qualcount=0;

            $education_qual =EducationQualification::where('person_id',$id)->get();

            $person_id=$education_qual->first();
            $person_id=$person_id->person_id;
//            dd($person_id);
            $education_qualcount2=$education_qual->count();
//            dd($count);
            if( isset ( $education_qualcount2 ) ) {
                $education_qualcount=$education_qualcount2;
            }
            if ($education_qualcount!=$count) {

                if ($education_qualcount!=0) {

                    for ($i = 0; $i < $education_qualcount; ++$i) {
                        $education_qual[$i]->delete();
                    };

                    for($i=0;$i<$count;++$i){
                        $education_qual = new EducationQualification ;
                        $education_qual->person_id=$person_id;
                        $education_qual->qualification_id=$data['qualification'][$i];
                        $education_qual->name_of_course=$data['courses'][$i];
                        $education_qual->name_of_institute=$data['institute'][$i];
                        $education_qual->year=$data['qualification_year'][$i];
                        $education_qual->save();
                    };
                }
                else{
                    return redirect()->back()->with('toast_error', 'Education Qualification');
                };
            }
            else{
                for($i=0;$i<$count;++$i){
                    $education_qual[$i]->qualification_id=$data['qualification'][$i];
                    $education_qual[$i]->name_of_course=$data['courses'][$i];
                    $education_qual[$i]->name_of_institute=$data['institute'][$i];
                    $education_qual[$i]->year=$data['qualification_year'][$i];
                    $education_qual[$i]->save();
                };
            };

            //////////////////=============================Qualification End//////////////////=============================
            ///
            ///    //////////////////=============================Language Known//////////////////=============================
            ///
            $count1=0;
            foreach ($data["language"] as $value){
                $count1=$count1+1;
            };
            $languageknowncount=0;

            $languageknown =LanguageKnown::where('person_id',$id)->get();

            $languageknowncount2=$languageknown->count();

            if( isset ( $languageknowncount2 ) ) {
                $languageknowncount=$languageknowncount2;
            }
            if ($languageknowncount!=$count1) {

                if ($languageknowncount!=0) {
                    for ($i = 0; $i < $languageknowncount; ++$i) {
                        $languageknown[$i]->delete();
                    };

                    for($i=0;$i<$count1;++$i){
                        $languageknown = new LanguageKnown ;
                        $languageknown->person_id=$person_id;
                        $languageknown->language=$data['language'][$i];
                        $languageknown->speaking=$data['speak'][$i];
                        $languageknown->reading=$data['read'][$i];
                        $languageknown->writing=$data['write'][$i];
                        $languageknown->save();
                    };
                }
                else{
                    for($i=0;$i<$count1;++$i){
                        $languageknown = new LanguageKnown ;
                        $languageknown->person_id=$person_id;
                        $languageknown->language=$data['language'][$i];
                        $languageknown->speaking=$data['speak'][$i];
                        $languageknown->reading=$data['read'][$i];
                        $languageknown->writing=$data['write'][$i];
                        $languageknown->save();
                    };
                };
            }
            else{
                for($i=0;$i<$count1;++$i){
                    $languageknown[$i]->language=$data['language'][$i];
                    $languageknown[$i]->speaking=$data['speak'][$i];
                    $languageknown[$i]->reading=$data['read'][$i];
                    $languageknown[$i]->writing=$data['write'][$i];
                    $languageknown[$i]->save();
                };
            };

            //////////////////=============================Language Known End//////////////////=============================

            ///    //////////////////=============================WorkExperience Start//////////////////=========================

            $count2=0;
            foreach ($data["name_company"] as $value){
                $count2=$count2+1;
            };

            $workexperiencecount=0;

            $workexperience =WorkExperience::where('person_id',$id)->get();

            $workexperiencecount2=$workexperience->count();
//            dd($count);
            if( isset ( $workexperiencecount2 ) ) {
                $workexperiencecount=$workexperiencecount2;
            }
            if ($workexperiencecount!=$count2) {
                if ($workexperiencecount!=0) {
                    for ($i = 0; $i < $workexperiencecount; ++$i) {
                        $workexperience[$i]->delete();
                    };

                    for($i=0;$i<$count2;++$i){
                        $workexperience = new WorkExperience() ;
                        $workexperience->person_id=$person_id;
                        $workexperience->name_of_company=$data['name_company'][$i];
                        $workexperience->position_held=$data['position_held'][$i];
                        $workexperience->from=$data['date_from'][$i];
                        $workexperience->to=$data['date_to'][$i];
                        $workexperience->reason_for_leaving=$data['reason_for_leave'][$i];
                        $workexperience->save();
                    };
                }
                else{
                    for($i=0;$i<$count2;++$i){
                        $workexperience = new WorkExperience() ;
                        $workexperience->person_id=$person_id;
                        $workexperience->name_of_company=$data['name_company'][$i];
                        $workexperience->position_held=$data['position_held'][$i];
                        $workexperience->from=$data['date_from'][$i];
                        $workexperience->to=$data['date_to'][$i];
                        $workexperience->reason_for_leaving=$data['reason_for_leave'][$i];
                        $workexperience->save();
                    };

                }

            }
            else{
                for($i=0;$i<$count2;++$i){
                    $workexperience[$i]->name_of_company=$data['name_company'][$i];
                    $workexperience[$i]->position_held=$data['position_held'][$i];
                    $workexperience[$i]->from=$data['date_from'][$i];
                    $workexperience[$i]->to=$data['date_to'][$i];
                    $workexperience[$i]->reason_for_leaving=$data['reason_for_leave'][$i];
                    $workexperience[$i]->save();
                };
            };

            //////////////////=============================WorkExperience End//////////////////=========================

            $count3=0;
            foreach ($data["knowledge_description"] as $value){
                $count3=$count3+1;
            };
            $knowledgecount=0;
            $knowledge_description =TrainingTechKnowledge::where('person_id',$id)->get();
            $knowledgecoun1t=$knowledge_description->count();
//            dd($knowledgecoun1t);

            if( isset ( $knowledgecoun1t ) ) {
                $knowledgecount=$knowledgecoun1t;
            }
            if ($knowledgecount!=$count3) {
                if ($knowledgecount!=0) {
                    for ($i = 0; $i < $knowledgecount; ++$i) {
                        $knowledge_description[$i]->delete();
                    };
                    for($i=0;$i<$count3;++$i){
                        $knowledge_description = new TrainingTechKnowledge ;
                        $knowledge_description->person_id=$person_id;
                        $knowledge_description->knowledge=$data['knowledge_description'][$i];
                        $knowledge_description->save();
                    };
                }
                else{
                    for($i=0;$i<$count3;++$i){
                        $knowledge_description = new TrainingTechKnowledge ;
                        $knowledge_description->person_id=$person_id;
                        $knowledge_description->knowledge=$data['knowledge_description'][$i];
                        $knowledge_description->save();
                    };
                }

            }
            else{
                for($i=0;$i<$count3;++$i){
                    $knowledge_description[$i]->knowledge=$data['knowledge_description'][$i];
                    $knowledge_description[$i]->save();
                };
            };


            ///             //////////////////=============================TrainingTechKnowledge End//////////////////=========================
            ///




            ///   //////////////////=============================Passport  End//////////////////=============================


            $passport_detail= Passport::where('person_id',$id)->first();

            $passport_detail->passport_no=$data['passport-no'];
            $passport_detail->issue_date=$data['issue_date'];
            $passport_detail->expiry_date=$data['expiry_date'];
            $passport_detail->issue_place=$data['issue_place'];
            $passport_detail->birth_place=$data['birth_place'];
            $passport_detail->birth_date=$data['birth_date'];
            $passport_detail->age=$data['age'];

            if(($request->doc_img != null)){
                $passport_detail->image = $request->file('doc_img')->store('Documents','public');
            }
            $passport_detail->save();

            ///   //////////////////=============================Passport  End//////////////////=============================

            return redirect()->route('viewmanpowerlist')->with('flash_message', 'Personnel Details Has Been Updated');;
        }
        return view('admin.Manpower.edit',compact('personnel','services','course_student'));

    }

    public function deletemanpower($id){
        if(\Gate::denies('admin')){
            abort(403, 'Access Denied');
        }

        $personnel=Student::findOrfail($id);
        $personnel->delete();
        return redirect()->route('viewmanpowerlist');

    }


    public function ajaxsearch(Request $request){

            if ($request->ajax()){
                $data = $request->all();
                $personnel = User::where('email', $data['email'])->get();
                if(($personnel->count()) > 0){

                    return view('admin.Manpower.list',compact('personnel'));
                }
                else{
                    return view('admin.Manpower.list')->with('msg','No Data for Query Found');

                }
            }
        return view('admin.Manpower.list')->with('msg','No Data for Query Found');


    }


    //generatePDF
     public function applicantPDF() {
        $data['manpower'] = Student::all();

        $pdf = PDF::loadView('admin.Manpower.pdf', $data);

         $pdf->save(storage_path().'_filename.pdf');

        return $pdf->download('manpower.pdf');
    }


    //print part
    public function printManpower(){
        $data['manpower'] =Student::all();
        return view('admin.Manpower.print',$data);
    }



}
