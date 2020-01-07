@extends('admin.layouts.admin_design')

@section('title') Edit Personnel @endsection

@section('content')


    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Edit Personnel</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                           href="{{ route('admin.dashboard') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Edit Personnel</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">Edit Personnel Details</header>


                    </div>
                    <div class="card-body " id="bar-parent">

        <form method="post" action="" enctype="multipart/form-data">
            @csrf

        <!-- Main content of Personal Details-->

{{--=====================Personal Interest========================   --}}



                <section class="content">
                    <div class="row">
                        <!-- Form controls -->
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="btn-group" id="buttonlist">
                                        <a class="btn btn-add " href="#">
                                            <i class="fa fa-list"></i>  Personnel's Interest </a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="position_applied">Position Applied For</label>
                                        <input type="text" name="position_applied" class="form-control" id="position_applied" placeholder="Position Applied" value="{{@$personnel->finaldetails->position_applied}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_person">Reference Person</label>
                                        <input type="text" class="form-control" name="reference_person" id="reference_person" placeholder="Reference Person" value="{{@$personnel->finaldetails->reference_person}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="ref_ontact">Contact</label>
                                        <input type="text" class="form-control" name="ref_contact" id="ref_contact" placeholder="Enter Reference Person Contact"  value="{{@$personnel->finaldetails->ref_contact}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <input type="text" class="form-control" name="country" id="country" placeholder="Enter Country" value="{{@$personnel->finaldetails->country}}"  required>
                                    </div>




                                    <div class="form-group">
                                        <label for="country">Service</label>
                                        <select class="form-control" name="course_id[]">
                                            <option value="none" selected disabled hidden>  Select Service Interested </option>
                                            @foreach($services as $value)
                                                <option value="{{$value->id}}" {{ in_array($value->id, $course_student) ? 'selected' : '' }}>{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="prof_img">Profile Image</label>
                                        <input value="{{@$personnel->finaldetails->country}}" type="hidden" name="prof_imgpast">
                                        <input type="file" class="form-control" name="prof_img" id="prof_img" value="{{@$personnel->finaldetails->country}}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>



                <input type="hidden" name="Personal Details" value="=====================Personal Details========================">

        <section class="content">
            <div class="row">
                <!-- Form controls -->
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group" id="buttonlist">
                                <a class="btn btn-add " href="#">
                                    <i class="fa fa-list"></i>  Personnel Details </a>

                            </div>
                        </div>
                        <div class="panel-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value="{{$personnel->name}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="father_name">Father's Name</label>
                                    <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Enter Father's Name" value="{{$personnel->father_name}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="mother_name">Mother's Name</label>
                                    <input type="text" class="form-control" name="mother_name" id="mother_name" placeholder="Enter Mother's Name" value="{{$personnel->mother_name}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="permanent_address">Permanent Address</label>
                                    <input type="text" class="form-control" name="permanent_address" id="permanent_address" placeholder="Enter Permanent Address" value="{{$personnel->permanent_address}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="temporary_address">Temporary Address</label>
                                    <input type="text" class="form-control" name="temporary_address" id="temporary_address" placeholder="Enter Temporary Address" value="{{$personnel->temporary_address}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Contact Number</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Contact Number" value="{{$personnel->phone}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="nationality">Nationality</label>
                                    <input type="text" class="form-control" name="nationality" placeholder="Enter Nationality" id="nationality" value="{{$personnel->nationality}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="height">Height(In CM)</label>
                                    <input type="number" class="form-control" name="height" placeholder="Enter height" id="height" value="{{$personnel->height}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="weight">Weight(In Kg)</label>
                                    <input type="number" class="form-control" name="weight" placeholder="Enter weight" id="weight" value="{{$personnel->weight}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="marital_status">Maritial status</label>
                                    <input type="text" class="form-control" name="maritial_status" placeholder="Enter Marital status" id="marital_status" value="{{$personnel->maritial_status}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="next_of_kin">Next of kin</label>
                                    <input type="text" class="form-control" name="next_of_kin" placeholder="Enter next of kin" id="next_of_kin" value="{{$personnel->next_of_kin}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="contact_number">Contact Number</label>
                                    <input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Enter Contact Number" value="{{$personnel->contact_no}}" required>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->

                <input type="hidden" name="Educational qualification" value="=====================Educational qualification========================">


                <!-- Main content of Educational qualification-->

                <section class="content">
                    <div class="row">
                        <!-- Form controls -->
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">

                                <div class="panel-heading">
                                    <div class="btn-group" id="buttonlist">
                                        <a class="btn btn-add " href="#">
                                            <i class="fa fa-list"></i>  Educational Qualification </a>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <fieldset class="form-group educationaldynamic-element" style="display:none;" disabled>
                                        <div class="row">
                                            <div class="form-group col-md-11 col-sm-10">
                                                <div class="form-group">
                                                    <label for="qualification">Qualification</label>
                                                    <select class="form-control" id="qualification" name="qualification[]">
                                                        <option  selected disabled hidden>  Select an Option </option>
                                                        <option value="Academic">Academic</option>
                                                        <option value="Technical">Technical/Professional</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="courses">Name of Course</label>
                                                    <input type="text" class="form-control" placeholder="Enter name of course" id="courses" name="courses[]" >
                                                </div>
                                                <div class="form-group">
                                                    <label  for="institute">Name of Institute</label>
                                                    <input type="text" class="form-control" placeholder="Enter name of Institute" id="institute" name="institute[]" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="qualyear">Year</label>
                                                    <input type="date" class="form-control" id="qualyear"  name="qualification_year[]"/>
                                                </div>
                                            </div>

                                            <div class="col-md-1">
                                                <p class="deleteducational"><i class="fa fa-close"style="color: red"></i></p>
                                            </div>
                                        </div>


                                    </fieldset>
                                    <!-- Button -->

                                    <div class="form-container dynamic col-md-12 col-sm-2">
                                        <fieldset>
                                            <div class="educationaldynamic-stuff">


                                                @foreach($personnel->education_qualifications as $education_qualification )


                                                <fieldset class="form-group educationaldynamic-element" >
                                                    <div class="row">
                                                        <div class="form-group col-md-11 col-sm-10">
                                                            <div class="form-group">
                                                                <label for="qualification">Qualification</label>
                                                                <select class="form-control" id="qualification" name="qualification[]">

                                                                    <option value="Academic"  >Academic</option>
                                                                    <option value="Technical" >Technical/Professional</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="courses">Name of Course</label>
                                                                <input type="text" class="form-control" placeholder="Enter name of course" id="courses" name="courses[]" value="{{$education_qualification->name_of_course}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label  for="institute">Name of Institute</label>
                                                                <input type="text" class="form-control" placeholder="Enter name of Institute" id="institute" name="institute[]" value="{{$education_qualification->name_of_institute}}" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="qualyear">Year</label>
                                                                <input type="date" class="form-control" id="qualyear"  name="qualification_year[]" value="{{$education_qualification->year}}"/>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-1">
                                                            <p class="deleteducational"><i class="fa fa-close"style="color: red"></i></p>
                                                        </div>
                                                    </div>


                                                </fieldset>
                                                    @endforeach

                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12"><a>
                                                    <center><p class="add-educationaldynamic"> Add Educational Qualification </p></center></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>


        <!-- /.content -->

                <input type="hidden" name="Work Experience" value="=====================Work Experience========================">




        <!-- Main content of Work Experience-->
                <section class="content">
                    <div class="row">
                        <!-- Form controls -->
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">

                                <div class="panel-heading">
                                    <div class="btn-group" id="buttonlist">
                                        <a class="btn btn-add " href="#">
                                            <i class="fa fa-list"></i>  Work Experience </a>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <fieldset class="form-group experiencedynamic-element" style="display:none;" disabled >

                                        <div class="row">
                                            <div class="form-group col-md-11 col-sm-10"  >
                                                <div class="form-group">
                                                    <label for="company_name">Name of Company</label>
                                                    <input type="text" id="company_name" class="form-control" placeholder="Enter name of Company" name="name_company[]" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="position_held">Position Held</label>
                                                    <input type="text" class="form-control" id="position_held" placeholder="Enter your position" name="position_held[]" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="fromdatepicker">From</label>
                                                    <input type="date" class="form-control" name="date_from[]" id="fromdatepicker" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="todatepicker">To</label>
                                                    <input type="date" class="form-control" name="date_to[]" id="todatepicker" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="reason_for_leave">Reason for Leaving</label>
                                                    <textarea name="reason_for_leave[]" id="reason_for_leave" class="form-control" ></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-1 col-sm-2">
                                                <p class="deleteexperience"><i class="fa fa-close" style="color: red"></i></p>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <!-- Button -->

                                    <div class="form-container dynamic col-md-12 col-sm-2">
                                        <fieldset>
                                            <div class="experiencedynamic-stuff">
                                                @foreach($personnel->work_experiences as $work_experience )
                                                <fieldset class="form-group experiencedynamic-element"  >

                                                    <div class="row">
                                                        <div class="form-group col-md-11 col-sm-10"  >
                                                            <div class="form-group">
                                                                <label for="company_name">Name of Company</label>
                                                                <input type="text" id="company_name" class="form-control" placeholder="Enter name of Company" name="name_company[]" value="{{$work_experience->name_of_company}}" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="position_held">Position Held</label>
                                                                <input type="text" class="form-control" id="position_held" placeholder="Enter your position" name="position_held[]" value="{{$work_experience->position_held}}" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="fromdatepicker">From</label>
                                                                <input type="date" class="form-control" name="date_from[]" id="fromdatepicker" value="{{$work_experience->from}}"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="todatepicker">To</label>
                                                                <input type="date" class="form-control" name="date_to[]" id="todatepicker" value="{{$work_experience->to}}"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="reason_for_leave">Reason for Leaving</label>
                                                                <textarea name="reason_for_leave[]" id="reason_for_leave" class="form-control" value="{{$work_experience->reason_for_leaving}}"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1 col-sm-2">
                                                            <p class="deleteexperience"><i class="fa fa-close" style="color: red"></i></p>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                @endforeach
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12"><a>
                                                    <center><p class="add-experiencedynamic"> Add Work Experience </p></center></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>

        <!-- /.content -->

                <input type="hidden" name="Language" value="=====================Language========================">

        <!-- Main content of  Language-->
        <section class="content">
            <div class="row">
                <!-- Form controls -->
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">

                        <div class="panel-heading">
                            <div class="btn-group" id="buttonlist">
                                <a class="btn btn-add " href="#">
                                    <i class="fa fa-list"></i>  Language Known </a>
                            </div>
                        </div>

                        <div class="panel-body">

                            <fieldset class="form-group dynamic-element" style="display:none" disabled>
                                                                <div class="row">
                                        <div class="form-group col-md-10 col-sm-10">
                                            <select class="form-control" name="language[]">
                                                <option value="none" selected disabled hidden>  Select known language </option>
                                                <option value="nep" >Nepali</option>
                                                <option value="ind" >Hindi</option>
                                                <option value="eng" >English</option>
                                                <option value="arb">Arabic</option>
                                                <option value="others">Others</option>
                                            </select>
                                            <label for="calibration">Level &emsp13;</label>

                                            <div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                     <select class="form-control" name="speak[]">
                                                        <option  selected disabled hidden>  Fluency In Speaking </option>
                                                        <option value="Good"  >Good</option>
                                                        <option value="Fair"  >Fair</option>
                                                        <option value="Slight"  >Slight</option>
                                                      </select>
                                                    </div>
                                                 <div class="col-md-4">
                                                     <select class="form-control" name="read[]">
                                                           <option  selected disabled hidden>  Fluency In Reading </option>
                                                        <option value="Good">Good</option>
                                                        <option value="Fair" >Fair</option>
                                                        <option value="Slight" >Slight</option>
                                                      </select>
                                                    </div>
                                                  <div class="col-md-4">
                                                     <select class="form-control" name="write[]">
                                                           <option  selected disabled hidden>  Fluency In Writing </option>
                                                        <option value="Good" >Good</option>
                                                        <option value="Fair" >Fair</option>
                                                        <option value="Slight" >Slight</option>
                                                      </select>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>

                                        <div class="col-md-2">
                                            <p class="deletelanguage"><i class="fa fa-close" style="color: red"></i></p>
                                        </div>
                                </div>
                            </fieldset>
                            <!-- Button -->

                            <div class="form-container dynamic col-md-12 col-sm-2">
                                <fieldset>
                                    <div class="languagedynamic-stuff">
                                        @foreach($personnel->language_known as $language_knowns )

                                        <fieldset class="form-group dynamic-element" >
                                            <div class="row">
                                                <div class="form-group col-md-11 col-sm-10">
                                                    <select class="form-control" name="language[]">
                                                        <option  selected disabled hidden>  Select known language </option>
                                                        <option value="nep" @if($language_knowns->language=="nep")selected  @endif >Nepali</option>
                                                        <option value="ind" @if($language_knowns->language=="ind")selected @endif >Hindi</option>
                                                        <option value="eng" @if($language_knowns->language=="eng")selected @endif >English</option>
                                                        <option value="arb" @if($language_knowns->language=="arb")selected @endif >Arabic</option>
                                                        <option value="others" @if($language_knowns->language=="others")selected @endif >Others</option>
                                                    </select>
                                             <label for="calibration">Level &emsp13;</label>
                                            <div>
                                                <div class="row" id="calibration">
                                                
                                                    <div class="col-md-4">

                                                     <select class="form-control" name="speak[]">
                                                         
                                                        <option value="Good" @if($language_knowns->speaking=="Good")selected  @endif >Good</option>
                                                        <option value="Fair" @if($language_knowns->speaking=="Fair")selected @endif >Fair</option>
                                                        <option value="Slight" @if($language_knowns->speaking=="Slight")selected @endif >Slight</option>
                                                      </select>
                                                    </div>
                                                 <div class="col-md-4">
                                                     <select class="form-control" name="read[]">
                                                        <option value="Good" @if($language_knowns->reading=="Good")selected  @endif >Good</option>
                                                        <option value="Fair" @if($language_knowns->reading=="Fair")selected @endif >Fair</option>
                                                        <option value="Slight" @if($language_knowns->reading=="Slight")selected @endif >Slight</option>
                                                      </select>
                                                    </div>
                                                  <div class="col-md-4">
                                                     <select class="form-control" name="write[]">
                                                        <option value="Good" @if($language_knowns->writing=="Good")selected  @endif >Good</option>
                                                        <option value="Fair" @if($language_knowns->writing=="Fair")selected @endif >Fair</option>
                                                        <option value="Slight" @if($language_knowns->writing=="Slight")selected @endif >Slight</option>
                                                      </select>
                                                    </div>
                                                </div>
                                            </div>
                                                </div>

                                                <div class="col-md-1">
                                                    <p class="deletelanguage"><i class="fa fa-window-close"></i></p>
                                                </div>
                                            </div>
                                        </fieldset>
                                            @endforeach

                                    </div>
                                </fieldset>
                            </div>

                            <div class="form-group">
                                <div class="row">
                       <div class="col-md-12"><center><a>
                                        <p class="add-onelanguage">Add Languages </p></a>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

                <input type="hidden" name="Training and Technical Knowledge" value="=====================Training and Technical Knowledge========================">



                <!-- Main content of  Training and Technical Knowledge-->
        <section class="content">
            <div class="row">
                <!-- Form controls -->
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">

                        <div class="panel-heading">
                            <div class="btn-group" id="buttonlist">
                                <a class="btn btn-add " href="#">
                                    <i class="fa fa-list"></i>  Training and Technical Knowledge </a>
                            </div>
                        </div>

                        <div class="panel-body">

                            <fieldset class="form-group knowledgedynamic-element" style="display:none" disabled>
                                <div class="row">
                                    <div class="form-group col-md-11">
                                        <input type="text" class="form-control" placeholder="Enter name of Training and Technical Knowledge" name="knowledge_description[]" >
                                    </div>

                                    <div class="col-md-1">
                                        <p class="deleteknowlegde"><i class="fa fa-close" style="color: red"></i></p>
                                    </div>
                                </div>
                            </fieldset>
                            <!-- Button -->

                            <div class="form-container dynamic col-md-12">
                                <fieldset>
                                    <div class="knowledegdynamic-stuff">
                                        @foreach($personnel->training_tech_knowledges as $training_tech_knowledge )
                                        <fieldset class="form-group knowledgedynamic-element" >
                                            <div class="row">
                                                <div class="form-group col-md-11">
                                                    <input type="text" class="form-control" placeholder="Enter name of Training and Technical Knowledge" name="knowledge_description[]" value="{{$training_tech_knowledge->knowledge}}" >
                                                </div>

                                                <div class="col-md-1">
                                                    <p class="deleteknowlegde"><i class="fa fa-close" style="color: red"></i></p>
                                                </div>
                                            </div>
                                        </fieldset>
                                            @endforeach


                                    </div>
                                </fieldset>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12"><center><a>
                                            <p class="add-oneknowlede" >Add Training and Technical Knowledge</p></a></center>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
                <input type="hidden" name="Passport Detail" value="=====================Passport Detail========================">


        <!-- Main content of Passport Detail-->
        <section class="content">
            <div class="row">
                <!-- Form controls -->
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group" id="buttonlist">
                                <a class="btn btn-add " >
                                    <i class="fa fa-list"></i>  Passport Detail </a>
                            </div>
                        </div>
                        <div class="panel-body">

                                <div class="form-group">
                                    <label for="passport_no">Passport No.</label>
                                    <input type="number" class="form-control" placeholder="Enter passport no" name="passport-no" id="passport_no" value="{{@$personnel->passport_details->passport_no}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="date_issue">Date of issue</label>
                                    <input type="date" class="form-control" placeholder="Enter date of issue" name="issue_date" id="date_issue" value="{{@$personnel->passport_details->issue_date}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="date_expiry">Date of expiry</label>
                                    <input type="date" class="form-control" placeholder="Enter date of expiry" name="expiry_date" id="date_expiry" value="{{@$personnel->passport_details->expiry_date}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="place_issue">Place of issue</label>
                                    <input type="text" class="form-control" placeholder="Enter Place of issue" name="issue_place" id="place_issue" value="{{@$personnel->passport_details->issue_place}}" required>
                                </div>

                                <div class="form-group">
                                    <label for="birth_place">Place of Birth</label>
                                    <input type="text" class="form-control" placeholder="Enter Place of Birth" name="birth_place" id="birth_place" value="{{@$personnel->passport_details->birth_place}}" required>
                                </div>

                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input id='dob' type="date" class="form-control" placeholder="Enter Date..."  name="birth_date" value="{{@$personnel->passport_details->birth_date}}">
                                </div>
                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <input type="number" class="form-control" placeholder="Enter Age" name="age" id="age" value="{{@$personnel->passport_details->age}}" required>
                                </div>
                            <div class="form-group">
                                <label for="doc_img">Document Image</label>
                                <input value="{{@$personnel->finaldetails->country}}" type="hidden" name="doc_imgpast">
                                <input type="file" class="form-control" name="doc_img" id="prof_img" placeholder="Document Image" value="{{@$personnel->passport_details->image}}" >
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
                <input type="hidden" name="Interview" value="=====================Interview========================">

        <!-- Main content of Interview-->
        <section class="content">
            <div class="row">
                <!-- Form controls -->
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group" id="buttonlist">
                                <a class="btn btn-add ">
                                    <i class="fa fa-list"></i>  Interview Comment </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <textarea name="interview_comment" class="form-control"  id="interview_comment" value="{{$personnel->interview_comments}}"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->

                    <!-- Button for Form Submit-->
                <section class="content">
                    <div class="row">
                        <div class="col-sm-12">
                            <center>
                                <button type="submit" class="btn-lg btn-primary"> Update Personnel</button>
                                </center>
                        </div>
                    </div>
                </section>


        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('css')



    <style>




        .content {
            min-height: 0px;

        }

        .form-container .dynamic{
            padding: 20px;
            width:100%;
            border-radius:2px;
            background-color: #ececec;
        }



        .ti-close:before {
            content: none;
        }

        .ti-pencil:before {
            content: none;
        }



    </style>

    <link href="{{asset('public/assets/plugins/summernote/summernote.css')}}" rel="stylesheet" type="text/css"/>


@endsection


@section('scripts')


    <script src="{{asset('public/assets/plugins/summernote/summernote.js')}}" type="text/javascript"></script>
    <script>
        //Summernote
        $(document).ready(function() {
            var note = $('#interview_comment');
            $(note).summernote({
                height: 200, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: true  // set focus to editable area after initializing summernote
            });
        });


    </script>




    {{--    Date picker for fromdatepicker--}}

    <script>
        $( function() {
            $( "#fromdatepicker" ).datepicker({
                maxDate: 0,
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        } );
    </script>
    {{--    Date picker for todatepicker--}}

    <script>
        $( function() {
            $( "#todatepicker" ).datepicker({
                maxDate: 0,
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        } );
    </script>
    {{--    Date picker for date_expiry--}}

    <script>
        $( function() {
            $( "#date_expiry" ).datepicker({
                maxDate: 0,
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        } );
    </script>

    {{--    Date picker for date_issue--}}

    <script>
        $( function() {
            $( "#date_issue" ).datepicker({
                maxDate: 0,
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        } );
    </script>


    {{--    Date picker for dob--}}
    <script>
        $( function() {
            $( "#dob" ).datepicker({
                viewMode: "years",
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        } );


    </script>

{{--    Date picker for Qualification--}}
    <script>
        $( function() {
            $( "#qualyear" ).datepicker({
                viewMode: "years",
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        } );
    </script>



    {{--    --Dynamic Nkowlegde and Techinical Form--}}

        <script>
        //Clone the hidden element and shows it
        $('.add-oneknowlede').click(function(){
            $('.knowledgedynamic-element').first().clone().appendTo('.knowledegdynamic-stuff').show().prop( "disabled", false);
            attach_deleteknowledge();
        });
        //Attach functionality to delete buttons
        function attach_deleteknowledge(){

            $('.deleteknowlegde').off();
            $('.deleteknowlegde').click(function(){
                console.log("click");
                $(this).closest('.form-group').remove();
            });
        }
     </script>


    <script>
        //Clone the hidden element and shows it
        $('.add-educationaldynamic').click(function(){
            $('.educationaldynamic-element').first().clone().appendTo('.educationaldynamic-stuff').show().prop( "disabled", false );
            attach_deleteducational();
        });
        //Attach functionality to delete buttons
        function attach_deleteducational(){

            $('.deleteducational').off();
            $('.deleteducational').click(function(){
                console.log("click");
                $(this).closest('.form-group').remove();
            });
        }
    </script>

    <script>
        //Clone the hidden element and shows it
        $('.add-experiencedynamic').click(function(){
            $('.experiencedynamic-element').first().clone().appendTo('.experiencedynamic-stuff').show().prop( "disabled", false );
            attach_deleteexperience();
        });
        //Attach functionality to delete buttons
        function attach_deleteexperience(){

            $('.deleteexperience').off();
            $('.deleteexperience').click(function(){
                console.log("click");
                $(this).closest('.form-group').remove();
            });
        }
    </script>

{{--    --Dynamic Language Form--}}

    <script>
        //Clone the hidden element and shows it
        $('.add-onelanguage').click(function(){

            $('.dynamic-element').first().clone().appendTo('.languagedynamic-stuff').show().prop( "disabled", false );
            attach_delete();
        });
        //Attach functionality to delete buttons
        function attach_delete(){
            $('.deletelanguage').off();
            $('.deletelanguage').click(function(){
                console.log("click");
                $(this).closest('.form-group').remove();
            });
        }
    </script>

    <!-- Include the Quill library -->






 @endsection
