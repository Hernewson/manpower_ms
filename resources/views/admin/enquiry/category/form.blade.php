@extends('admin.layouts.admin_design')

@section('title') Vacancy @endsection

@section('content')

<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">{{ (isset($data)?'Update':'Add New') }} Vacancy Management </div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                        href="{{ route('admin.dashboard') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">{{ (isset($data)?'Update':'Add New') }} Vacancy </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>{{ (isset($data)?'':'New') }} Vacancy Details</header>


                </div>
                <div class="card-body " id="bar-parent">
                    @if(isset($data))
                    <form method="post" action="{{ route('category.update',$data->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @else
                        <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                            @csrf
                            @endif

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Vacancy Name</label>
                                            <input type="text" class="form-control" id="name"
                                                value="{{ @$data->cat_name }}" placeholder="Enter name" name="cat_name"
                                                data-validation="length" data-validation-length="3-400"
                                                data-validation-error-msg="Course Name is required (3-50 chars)">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Company Name</label>
                                            <input type="text" class="form-control" id="name"
                                                value="{{ @$data->cat_companyName }}" placeholder="Enter name"
                                                name="companyName" data-validation="length"
                                                data-validation-length="3-400">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Expiray Date</label>
                                            <input type="date" class="form-control" id="date"
                                                value="{{ @$data->cat_expiryDate }}" placeholder="Enter Expiry Date"
                                                name="expiryDate" data-validation="length"
                                                data-validation-length="3-400">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Number of Vacancies</label>
                                            <input type="number" class="form-control" id="name"
                                                value="{{ @$data->cat_vacancies }}" placeholder="Enter Vacancy"
                                                name="vacancies">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="country">Please Select Country</label>
                                            <select class="form-control" name="countries" data-validation="required"
                                                data-validation-error-msg="At Least a Country is Required">
                                                <option selected disabled hidden>Select Country</option>
                                                <option value="Malaysia" @if(@$data->cat_countries =="Malaysia")
                                                    selected
                                                    @endif>Malaysia</option>
                                                <option value="Qatar" @if(@$data->cat_countries =="Qatar") selected
                                                    @endif>Qatar</option>
                                                <option value="UAE" @if(@$data->cat_countries =="UAE") selected
                                                    @endif>UAE
                                                </option>
                                                <option value="Saudi" @if(@$data->cat_countries =="Saudi") selected
                                                    @endif>Saudi Arabia</option>
                                                <option value="Oman" @if(@$data->cat_countries =="Oman") selected
                                                    @endif>Oman
                                                </option>
                                                <option value="Japan" @if(@$data->cat_countries =="Japan") selected
                                                    @endif>Japan</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Lot Number</label>
                                            <input type="number" class="form-control" id="number"
                                                value="{{ @$data->cat_lotNumber }}" placeholder="Enter Lot Number"
                                                name="lotNumber">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Approved Date</label>
                                            <input type="date" class="form-control" id="date"
                                                value="{{ @$data->cat_approvalDate }}" placeholder="Enter Expiry Date"
                                                name="approvalDate">
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="checkbox" name="status" id="status" value="1"
                                                    {{ @($data->status == 1)?'checked':'' }}>
                                                <label for="status">Active</label>
                                            </div>
                                        </div>
                                    </div>


                                </div>


                            </div>


                            <button type="submit" class="btn btn-primary">{{ (isset($data)?'Update':'Add New') }}
                                Vacancy</button>

                            <a href="{{ route('category.index') }}" class="btn btn-danger">Go Back</a>

                        </form>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection




@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

<script>
    $.validate({
            lang: 'en',
            modules: 'file',
        });

</script>

<script src="{{ asset('adminAssets/assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('adminAssets/assets/js/jquery.sweet-alert.custom.js') }}"></script>
<script type="text/javascript">
    @if(session('flash_message'))
        swal("Success!", "{!! session('flash_message') !!}", "success")
        @endif

        @if(session('flash_error'))
        swal("Error", "{!! session('flash_error') !!}")
        @endif
</script>



<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script>
    $(document).ready(function() {
            $('#description').summernote({
                'height' : 130
            });
        });
</script>
@endsection
