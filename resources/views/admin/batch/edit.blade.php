
@extends('admin.layouts.admin_design')

@section('title')  Update Batch @endsection

@section('content')

    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Update Batch - {{$batch->batch_name}}</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                           href="{{ route('admin.dashboard') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Update Batch</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">Batch Details</header>


                    </div>
                    <div class="card-body " id="bar-parent">
                        <form method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Batch Name</label>
                                            <input type="text" class="form-control" id="name"
                                                   placeholder="Enter name" name="name" data-validation="length"
                                                   data-validation-length="3-400"
                                                   data-validation-error-msg="Course Name is required (3-50 chars)" value="{{$batch->batch_name}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="year">Year  </label>


                                                    <div class="wrapper-year">
                                                <select name="year" class="form-control "data-validation="required"
                                                    data-validation-error-msg="Year is required" onfocus='this.size=10;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>

                                                <option value="{{$batch->year}} " selected hidden> {{$batch->year}}  </option>

                                                <?php $last= date('Y')-5; ?>
                                                <?php $future = date('Y')+15; ?>

                                                @for ($i=$last; $i < $future; $i++)
                                                    <option>{{$i}}</option>
                                                @endfor

                                            </select>
                                                    </div>


                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="month">Month  </label>
                                            <select name="month" class="form-control" id="month" data-validation="required"
                                                    data-validation-error-msg="Month is required">
                                                <option value="{{$batch->month}} " selected hidden> {{$batch->month}}  </option>
                                                <option value="January" >January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="shift">Please Select Course
                                            </label>
                                            <select id="shift" class="form-control select2-multiple" name="course_id[]" multiple data-validation="required"
                                                    data-validation-error-msg="At Least a course is required">

                                                @foreach($courses as $course)
                                                    <option value="{{ $course->id }}" {{ in_array($course->id, $batch_course) ? 'selected' : '' }}>{{ $course->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                     <div class="col-md-12">
                                        <div class="form-group">
                                        <label for="section">Please Select Section
                                        </label>
                                            <select id="section" class="form-control " name="section" data-validation="required"
                                                    data-validation-error-msg="At Least a section is required">
                                                @foreach($sections as $section)
                                                    
                                                <option value="{{ $section->id }}" >{{ $section->section_name }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>



                                      <div class="col-md-12">
                                        <div class="form-group">
                                        <label for="shift">Please Select Shifts
                                        </label>
                                            <select id="shift" class="form-control select2-shift" name="shift_id[]" multiple data-validation="required"
                                                    data-validation-error-msg="At Least a shift is required">
                                                @foreach($shifts as $shift)
                                                <option value="{{ $shift->id }}" {{ in_array($shift->id, $batch_shift) ? 'selected' : '' }}>{{ $shift->shift_available }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <button  type="submit" class="btn btn-primary">Update Batch</button>
                                    <a href="{{ route('viewBatches') }}" class="btn btn-danger">Go Back</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection



@section('css')
    {{--    Multiselect--}}
    <!--select2-->
    <link href="{{asset('public/adminAssets/assets/plugins/select2/css/select2.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/adminAssets/assets/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />


@endsection






@section('scripts')

    /*Multiselect*/

<script src="{{asset('public/adminAssets/assets/plugins/select2/js/select2.js')}}"></script>
<script src="{{asset('public/adminAssets/assets/js/pages/select2/select2-init.js')}}"></script>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

    <script>
        $.validate({
            lang: 'en',
            modules: 'file',
        });

        $(document).ready(function() {
            $('.select2-multiple').select2({
                placeholder: 'Please Choose Course'
            });
             $('.select2-shift').select2({
            placeholder: 'Please Choose Shifts'
        });
        });

    </script>

    <script src="{{ asset('public/adminAssets/assets/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('public/adminAssets/assets/js/jquery.sweet-alert.custom.js') }}"></script>
    <script type="text/javascript">
        @if(session('flash_message'))
        swal("Success!", "{!! session('flash_message') !!}", "success")
        @endif

        @if(session('flash_error'))
        swal("Error", "{!! session('flash_error') !!}")
        @endif
    </script>




@endsection
