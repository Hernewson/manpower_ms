@extends('admin.layouts.admin_design')

@section('title')  Dashboard - Manpower Management System (MMS) @endsection

@section('content')
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Dashboard</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"  href="{{ route('admin.dashboard') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
        <!-- start widget -->
        @if(Auth::user()->can('admin_staff'))
        <div class="state-overview">
						<div class="row">
							<div class="col-lg-3 col-sm-6">
								<div class="overview-panel purple">
									<div class="symbol">
										<i class="fa fa-users usr-clr"></i>
									</div>
									<div class="value white">
										<p class="sbold addr-font-h1" data-counter="counterup" data-value="{{ $students->count() }} ">
                                           {{ $students->count() }} 
                                        </p>
										<p>Applicants</p>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="overview-panel deepPink-bgcolor">
									<div class="symbol">
										<i class="fa fa-user"></i>
									</div>
									<div class="value white">
										<p class="sbold addr-font-h1" data-counter="counterup" data-value="{{ $enquiries->count() }} ">
                                        {{ $enquiries->count() }} 
                                        </p>
										<p>Enquiries</p>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="overview-panel orange">
									<div class="symbol">
                                    <i class="material-icons">school</i>
									</div>
									<div class="value white">
										<p class="sbold addr-font-h1" data-counter="counterup" data-value="{{ $courses->count() }}">
										{{ $courses->count() }}
                                        </p>
                                        <p>Services</p>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="overview-panel blue-bgcolor">
									<div class="symbol">
                                    <i class="material-icons"></i>
                                    NPR
									</div>
									<div class="value white">
										<p class="sbold addr-font-h1" data-counter="counterup" data-value="{{ $payments->sum('amount_paid') }}">
										     {{ $payments->sum('amount_paid') }}
                                        </p>
										<p>Total Income</p>
									</div>
								</div>
							</div>
                        </div>
        </div>
        
   

                            </div>
                            </div>
                        </div>
                    </div>
                    </div>
        @endif
        <!-- end widget -->

 <!-- ====================================================STUDENT DASHBOARD========================================================================= -->
 @if(Auth::user()->can('student'))
 <div class="state-overview">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-b-green">
                        <span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">My Teachers</span>
                            <span class="info-box-number">2</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 45%"></div>
                            </div>
                            
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-b-yellow">
                        <span class="info-box-icon push-bottom"><i class="material-icons">person</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Exams</span>
                            <span class="info-box-number">155</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 40%"></div>
                            </div>
                            
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-b-blue">
                        <span class="info-box-icon push-bottom"><i class="material-icons">school</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">My Course</span>
                            <span class="info-box-number">2</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 85%"></div>
                            </div>
                            
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-b-pink">
									<span class="info-box-icon push-bottom"><i
                                                class="material-icons">monetization_on</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Fees Details</span>
                            <span class="info-box-number">13,921</span><span>$</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 50%"></div>
                            </div>
                            
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
        </div>
        @endif
        <!-- end widget -->
<!--------- ========================================STUDENT DASHBOARD END======================================================================== -->

<!-- ====================================================Teacher DASHBOARD========================================================================= -->
@if(Auth::user()->can('teacher'))
 <div class="state-overview">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-b-green">
                        <span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">My Student</span>
                            <span class="info-box-number">2</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 45%"></div>
                            </div>
                            
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-b-yellow">
                        <span class="info-box-icon push-bottom"><i class="material-icons">person</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Exams</span>
                            <span class="info-box-number">155</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 40%"></div>
                            </div>
                            
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-b-blue">
                        <span class="info-box-icon push-bottom"><i class="material-icons">school</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">My Course</span>
                            <span class="info-box-number">2</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 85%"></div>
                            </div>
                            
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
               
                            
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
        </div>
        @endif
        <!-- end widget -->
<!--------- ========================================Teacher DASHBOARD END======================================================================== -->
<!--------- ========================================Staff Dashboard======================================================================== -->


<!--------- ========================================Staff DASHBOARD END======================================================================== -->


</div>

    @endsection