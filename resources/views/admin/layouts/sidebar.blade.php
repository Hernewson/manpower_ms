<?php $url = url()->current(); ?>

<div class="sidebar-container">
    <div class="sidemenu-container navbar-collapse collapse fixed-menu">
        <div id="remove-scroll" class="left-sidemenu">
            <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false" data-auto-scroll="true"
                data-slide-speed="200" style="padding-top: 20px">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <?php $current_user = auth()->user(); ?>
                <li class="sidebar-user-panel">
                    <div class="user-panel">
                        <div class="pull-left image">
                            @if($current_user->image == "NULL")
                            <img src="{{ asset('/uploads/profile/'.$current_user->image) }}"
                                class="img-circle user-img-circle" alt="{{ $current_user->name }}" />
                            @else
                            <img src="{{ asset('/uploads/profile/profile.png') }}" class="img-circle user-img-circle"
                                alt="{{ $current_user->name }}" />
                            @endif
                        </div>
                        <div class="pull-left info">
                            <p> {{ $current_user->name }} </p>
                            <a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline">
                                    Online</span></a>
                        </div>
                    </div>
                </li>
                <li class="nav-item start <?php if (preg_match("/dashboard/i", $url)) {
                                                echo 'active';
                                            } ?>">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link nav-toggle">
                        <i class="material-icons">dashboard</i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                    </a>
                </li>


                @if(Auth::user()->can('admin_staff'))



                <li class="nav-item <?php if (preg_match("/user/i", $url)) {
                                        echo 'active open';
                                    } ?>">
                    <a href="" class="nav-link nav-toggle"> <i class="material-icons">face</i>
                        <span class="title">Users</span>
                        <span class="arrow"></span>

                    </a>

                    <ul class="sub-menu">
                        <li class="nav-item <?php if (preg_match("/add/i", $url)) {
                                                echo 'active';
                                            } ?>">
                            <a href="{{ route('addUser') }}" class="nav-link ">
                                <span class="title">Add User</span>
                            </a>

                        </li>
                        <li class="nav-item <?php if (preg_match("/users/i", $url)) {
                                                echo 'active';
                                            } ?>">
                            <a href="{{ route('viewAllUsers') }}" class="nav-link ">
                                <span class="title">View All Users</span>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item <?php if (preg_match("/category/i", $url)) {
                                        echo 'active open';
                                    } ?>">
                    <a href="" class="nav-link nav-toggle"> <i class="material-icons">group
                        </i>
                        <span class="title">Enquiry</span>
                        <span class="arrow"></span>

                    </a>

                    <ul class="sub-menu">
                        <li class="nav-item <?php if (preg_match("/add/i", $url)) {
                                                echo 'active';
                                            } ?>">
                            <a href="{{ route('category.index') }}" class="nav-link ">
                                <span class="title">Vacancy</span>
                            </a>

                        </li>
                        <li class="nav-item <?php if (preg_match("/source/i", $url)) {
                                                echo 'active';
                                            } ?>">
                            <a href="{{ route('source.index') }}" class="nav-link ">
                                <span class="title">Enquiry Source</span>
                            </a>

                        </li>
                        <li class="nav-item <?php if (preg_match("/enquiry/i", $url)) {
                                                echo 'active';
                                            } ?>">
                            <a href="{{ route('enquiry.index') }}" class="nav-link ">
                                <span class="title">View Enquiries</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item  <?php if (preg_match("/personnel/i", $url)) {
                                            echo 'active';
                                        } ?>">
                    <a href="{{ route('viewmanpowerlist') }}" class="nav-link nav-toggle">
                        <i class="material-icons">person</i>
                        <span class="title">Applicants</span>
                        <span class="selected"></span>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="" class="nav-link nav-toggle"> <i class="material-icons">school</i>
                        <span class="title">Service</span>
                        <span class="arrow"></span>

                    </a>

                    <ul class="sub-menu">
                        <li class="nav-item <?php if (preg_match("/service_add/i", $url)) {
                                                echo 'active';
                                            } ?>">
                            <a href="{{ route('addCourse') }}" class="nav-link ">
                                <span class="title">Add Service</span>
                            </a>

                        </li>
                        <li class="nav-item <?php if (preg_match("/service_view/i", $url)) {
                                                echo 'active';
                                            } ?>">
                            <a href="{{ route('viewCourses') }}" class="nav-link ">
                                <span class="title">View All Services</span>
                            </a>
                        </li>

                    </ul>
                </li>




                <li class="nav-item <?php if (preg_match("/attendance/i", $url)) {
                                        echo 'active open';
                                    } ?>">
                    <a href="" class="nav-link nav-toggle"> <i class="material-icons">gavel</i>
                        <span class="title">HR</span>
                        <span class="arrow"></span>

                    </a>


                    <ul class="sub-menu">
                        <li class="nav-item <?php if (preg_match("/attendance_staff/i", $url)) {
                                                echo 'active';
                                            } ?>">
                            <a href="{{ route('staffAttendance') }}" class="nav-link ">
                                <span class="title">Staff Attendance</span>
                            </a>
                        </li>


                        <li class="nav-item <?php if (preg_match("/attendance_report/i", $url)) {
                                                echo 'active';
                                            } ?>">
                            <a href="{{ route('viewReport') }}" class="nav-link ">
                                <span class="title"> Attendance Report</span>
                            </a>
                        </li>

                    </ul>
                </li>





                <li class="nav-item <?php if (preg_match("/account/i", $url)) {
                                        echo 'active open';
                                    } ?>">
                    <a href="" class="nav-link nav-toggle"> <i class="fa fa-usd"></i>
                        <span class="title">Account</span>
                        <span class="arrow"></span>

                    </a>

                    <ul class="sub-menu">

                        <li class="nav-item <?php if (preg_match("/expence/i", $url)) {
                                                echo 'active open';
                                            } ?>">
                            <a href="" class="nav-link nav-toggle">
                                <i class="material-icons">monetization_on</i>
                                <span class="title">Manage Expense</span>
                                <span class="arrow"></span>

                            </a>

                            <ul class="sub-menu">
                                <li class="nav-item <?php if (preg_match("/add/i", $url)) {
                                                        echo 'active';
                                                    } ?>">
                                    <a href="{{ route('viewExpenseCategory') }}" class="nav-link ">
                                        <span class="title">Expense Category</span>
                                    </a>

                                </li>
                                <li class="nav-item <?php if (preg_match("/add/i", $url)) {
                                                        echo 'active';
                                                    } ?>">
                                    <a href="{{ route('viewExpense') }}" class="nav-link ">
                                        <span class="title">Expenses</span>
                                    </a>

                                </li>


                            </ul>
                        </li>

                        <li class="nav-item  <?php if (preg_match("/fee/i", $url)) {
                                            echo 'active';
                                        } ?>">
                            <a href="{{ route('viewFees') }}" class="nav-link nav-toggle">
                                <i class="material-icons">monetization_on</i>
                                <span class="title">Manage Income</span>
                                <span class="selected"></span>
                            </a>
                        </li>

                        <li class="nav-item  <?php if (preg_match("/balance/i", $url)) {
                                                            echo 'active';
                                                        } ?>">
                            <a href="{{ route('admin.balances.browse') }}" class="nav-link nav-toggle">
                                <i class="fa fa-usd"></i>
                                <span class="title">Balance Report</span>
                                <span class="selected"></span>
                            </a>
                        </li>

                    </ul>
                </li>







                <li class="nav-item">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="material-icons">contact_mail</i>
                        <span class="title">Send SMS</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">

                        <li class="nav-item">


                            <a href="{{ route('viewSmsTemplate') }}" class="nav-link">

                                <i class="material-icons">contact_mail</i> SMS Template </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('s_smsview')}}" class="nav-link nav-toggle">
                                <i class="fa fa-user"></i>To Applicants

                            </a>

                        </li>
                        {{-- <li class="nav-item">--}}
                        {{-- <a href="{{route('t_smsview')}}" class="nav-link nav-toggle">--}}
                        {{-- <i class="fa fa-university"></i> Teacher--}}

                        {{-- </a>--}}

                        {{-- </li>--}}

                        <li class="nav-item">
                            <a href="{{route('e_smsview')}}" class="nav-link nav-toggle">
                                <i class="material-icons">face</i> To Enquiries

                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="{{route('st_smsview')}}" class="nav-link nav-toggle">
                                <i class="fa fa-user"></i>To Staff

                            </a>

                        </li>


                    </ul>
                </li>

                <li class="nav-item">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="material-icons">email</i>
                        <span class="title">Send Email </span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">

                        <li class="nav-item">
                            <a href="{{ route('viewEmailTemplate') }}" class="nav-link">
                                <i class="material-icons">contact_mail</i> Email Template </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('s_emailview')}}" class="nav-link nav-toggle">
                                <i class="fa fa-user"></i>To Applicants

                            </a>

                        </li>
                        {{-- <li class="nav-item">--}}
                        {{-- <a href="{{route('t_emailview')}}" class="nav-link nav-toggle">--}}
                        {{-- <i class="fa fa-university"></i> Teacher--}}

                        {{-- </a>--}}

                        {{-- </li>--}}

                        <li class="nav-item">
                            <a href="{{route('e_emailview')}}" class="nav-link nav-toggle">
                                <i class="material-icons">face</i>To Enquiries

                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="{{route('st_emailview')}}" class="nav-link nav-toggle">
                                <i class="fa fa-user"></i> To Staff

                            </a>

                        </li>
                    </ul>
                </li>

                <li class="nav-item  <?php if (preg_match("/site/i", $url)) {
                                            echo 'active';
                                        } ?>">
                    <a href="{{ route('siteSettings') }}" class="nav-link nav-toggle">
                        <i class="material-icons">settings</i>
                        <span class="title">Site Settings</span>
                        <span class="selected"></span>
                    </a>
                </li>





                @endif


                <!-- ===============================================================STUDENT====================================================== -->
                @if(Auth::user()->can('student'))
                <li class="nav-item <?php if (preg_match("/myprofile/i", $url)) {
                                        echo 'active';
                                    } ?>">
                    <a href="{{route('mystudentprofile')}}" class="nav-link ">
                        <i class="material-icons">account_circle</i>
                        <span class="title">My profile</span>
                    </a>
                </li>
                <li class="nav-item <?php if (preg_match("/view_t/i", $url)) {
                                        echo 'active';
                                    } ?>">
                    <a href="{{route('viewAllTeachers')}}" class="nav-link ">
                        <span class="title">View All Staff</span>
                        <i class="material-icons">group</i>
                    </a>
                </li>
                <li class="nav-item  <?php if (preg_match("/course/i", $url)) {
                                            echo 'active';
                                        } ?>">
                    <a href="{{ route('viewCourses') }}" class="nav-link ">
                        <span class="title">My Services</span>
                        <i class="material-icons">school</i>
                    </a>
                </li>


                @endif

                <!-- ===============================================================Teacher====================================================== -->
                @if(Auth::user()->can('teacher'))

                <li class="nav-item <?php if (preg_match("/myprofile/i", $url)) {
                                        echo 'active';
                                    } ?>">
                    <a href="{{route('myprofile')}}" class="nav-link ">
                        <i class="material-icons">account_circle</i>
                        <span class="title">My profile</span>
                    </a>
                </li>
                <li class="nav-item <?php if (preg_match("/view_t/i", $url)) {
                                        echo 'active';
                                    } ?>">
                    <a href="{{route('viewStudent')}}" class="nav-link ">
                        <span class="title">View My Clients</span>
                        <i class="material-icons">group</i>
                    </a>
                </li>

                <li class="nav-item  <?php if (preg_match("/course/i", $url)) {
                                            echo 'active';
                                        } ?>">

                    <a href="{{ route('viewCourses') }}" class="nav-link nav-toggle">
                        <i class="material-icons">school</i>
                        <span class="title">Services</span>
                        <span class="selected"></span>

                    </a>
                </li>

                <li class="nav-item <?php if (preg_match("/view_t/i", $url)) {
                                        echo 'active';
                                    } ?>">
                    <a href="{{ route('viewAllExams') }}" class="nav-link ">
                        <span class="title">My Exams</span>
                        <i class="material-icons">import_contacts</i>
                    </a>
                </li>

                @endif











        </div>
    </div>
</div>
