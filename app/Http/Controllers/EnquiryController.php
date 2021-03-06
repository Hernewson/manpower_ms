<?php

namespace App\Http\Controllers;

use App\Enquiry;
use PDF;
use App\FinalDetail;
use App\Student;
use App\EnquiryCategory;
use App\EnquiryResponse;
use App\EnquirySource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\EducationQualification;
use App\WorkExperience;


use App\LanguageKnown;
use App\Passport;
use App\TrainingTechKnowledge;
use App\InterviewComment;

class EnquiryController extends Controller
{

    protected $enquiry = null;
    protected $category = null;


    public function __construct(Enquiry $enquiry, EnquiryCategory $category)
    {
        $this->enquiry = $enquiry;
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->enquiry->orderBy('id', 'DESC')->get();
        $sources = EnquirySource::all();
        $categories = EnquiryCategory::all();
        return view('admin.enquiry.enquiry.view')->with('enquries', $data)->with('sources', $sources)->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sources = EnquirySource::where('status', 1)->get();
        $categories = EnquiryCategory::where('status', 1)->get();
        return view('admin.enquiry.enquiry.form')->with('categories', $categories)->with('sources', $sources);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->request);
        $rules = $this->enquiry->getValidationRules();
        $request->validate($rules);
        // dd($request->request);
        $data = $request->all();
        $enquiry = new Enquiry;
        $enquiry->name = $data['name'];
        $enquiry->email = $data['email'];
        $enquiry->phone = $data['phone'];
        $enquiry->country = $data['country'];
        $enquiry->date = $data['date'];
        $enquiry->remarks = $data['remarks'];
        if(isset($data['visited'])){
            $enquiry->visited=1;
        }
        else{
            $enquiry->visited=0;
        }
        $enquiry->save();

        $enquiry_source_id = $data['source'];
        $enquiry_categories_id = $data['enquiry_categories'];

        $enquiry->sources()->attach($enquiry_source_id);
        $enquiry->category()->attach($enquiry_categories_id);

        if(!empty($data['enquiries_responses'])){
        $enquiries_responses_id = $data['enquiries_responses'];
        $enquiry->enquiry_responses()->attach($enquiries_responses_id);
        }


        return redirect()->route('enquiry.index')->with('flash_message', 'New Enquiry Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->enquiry->find($id);
        $categories = EnquiryCategory::where('status', 1)->get();
        $enquiries_category = $data->category()->pluck('enquiry_category_id')->toArray();
        $sources = EnquirySource::where('status', 1)->get();
        $enquiries_source = $data->sources()->pluck('enquiry_source_id')->toArray();
        $enquiries_response = EnquiryResponse::where('enquiry_id', $id)->pluck('enquiry_response_id')->toArray();
        return view('admin.enquiry.enquiry.form')
            ->with('categories', $categories)
            ->with('data', $data)
            ->with('sources', $sources)
            ->with('enquiries_source', $enquiries_source)
            ->with('enquiries_category', $enquiries_category)
            ->with('enquiries_response', $enquiries_response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = $this->enquiry->getValidationRules();
        $request->validate($rules);
        $this->enquiry = $this->enquiry->find($id);
        $data = $request->all();
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->name = $data['name'];
        $enquiry->email = $data['email'];
        $enquiry->phone = $data['phone'];
        $enquiry->country = $data['country'];
        $enquiry->date = $data['date'];
        $enquiry->remarks = $data['remarks'];
        if(isset($data['visited'])){
            $enquiry->visited=1;
        }
        else{
            $enquiry->visited=0;
        }
        $enquiry->save();

        $enquiry_source_id = $data['source'];
        $enquiry_categories_id = $data['enquiry_categories'];



        $enquiry->sources()->sync($enquiry_source_id);
        $enquiry->category()->sync($enquiry_categories_id);




        if(empty($data['enquiries_responses'])){

            $enquiries_responses_id = $data['enquiries_responses_hidden'];
            $enquiry->enquiry_responses()->detach($enquiries_responses_id);

        } else {
            $enquiries_responses_id = $data['enquiries_responses'];
            $enquiry->enquiry_responses()->sync($enquiries_responses_id);
        }




        return redirect()->route('enquiry.index')->with('flash_message', 'Enquiry Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->enquiry = $this->enquiry->find($id);
        $success = $this->enquiry->delete();
        if ($success) {
            return redirect()->route('enquiry.index')->with('flash_message', 'Enquiry Has Been Deleted');
        }
    }

    public function addtoclient(Request $request){


        $enquiry=Enquiry::findorFail($request->enquiry_id);
        $client=Student::where('email',$enquiry->email)->count();






        if($client!=null){
            return redirect()->route('enquiry.index')->with('flash_error', 'Client already exist');
        }

                $student = new Student;
                $student->name = $enquiry->name;
                $student->email = strtolower($enquiry->email);
                $student->phone =$enquiry->phone;

                $student->save();
                if ($student->save()) {
                    $personsid = DB::getPdo()->lastInsertId();
                };
                
                



           


            
                $education_qual = new EducationQualification() ;
                $education_qual->person_id=$personsid;
                
                $education_qual->save();
            


            
           
                $workexperience = new WorkExperience() ;
                $workexperience->person_id=$personsid;
               
                $workexperience->save();
            



           
                $languageknown = new LanguageKnown ;
                $languageknown->person_id=$personsid;
               
                $languageknown->save();
           

           
                $knowledge_description = new TrainingTechKnowledge ;
                $knowledge_description->person_id=$personsid;
               
                $knowledge_description->save();
            


            $passport_detail= new Passport;
            $passport_detail->person_id=$personsid;
           
            $passport_detail->save();


                $enquiry_category = $enquiry->category->sortBy('cat_name')->pluck('id');

                foreach($enquiry_category as $data){

             $catname=\App\EnquiryCategory::find($data)->cat_name;
            }


                $studentctry=new FinalDetail;

                $studentctry->person_id=$personsid;
                $studentctry->country=$enquiry->country;
                $studentctry->position_applied=$catname;
                $studentctry->save();

                $enquiry->delete();

                return redirect()->route('viewmanpowerlist')->with('flash_message', 'Enquiry Has Been Added to Clients');
    }
    
    
    //generatePDF
     public function enquiry_pdf() {
         
        $data['enquiry'] = Enquiry::all();

        $pdf = PDF::loadView('admin.enquiry.pdf', $data);

         $pdf->save(storage_path().'_filename.pdf');

        return $pdf->download('enquiry.pdf');
    }

    
    //print part
    public function printEnquiry(){
        $data['enquiry'] =Enquiry::all();
        return view('admin.enquiry.print',$data);
    }
}















