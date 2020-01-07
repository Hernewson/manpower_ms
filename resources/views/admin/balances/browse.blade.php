@extends('admin.layouts.admin_design')

@section('title') Balance Report  @endsection

@section('content')
<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Balance Report</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('admin.dashboard') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Balance Report</li>
            </ol>
        </div>
    </div>
    
    @if(Auth::user()->can('admin_staff'))
    <div class="card card-box">
        <div class="container">
            <div class="row">

                <div class="col-md-12 card-head">
                    <h3>Balance Report</h3>
                    <section class="col-lg-12 connectedSortable">
                        <div class="box box-success">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form method="POST" action="{{ route('admin.balances.report')}}">
                                            @csrf
                                            <label for="date1">From: <br>
                                                <input type="date" class="form-control" name="date1" id="">
                                            </label><br>
                                            <label for="date2">To: <br>
                                                <input type="date" class="form-control" name="date2" id="">
                                            </label> <br>
                                            <input class="btn btn-success" type="submit" value="Report">
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table ">
                                            <thead>
                                                @if($date1 !=null)
                                                From {{$date1}}-  12 AM To {{$date2}}- 11:59 PM
                                                @endif
                                                <tr class="page-header ">
                                                    <th>
                                                        <h3>Totals</h3>
                                                    </th>
                                                </tr>
                                                <tr class="alert ">
                                                    <th> Total Cash In</th>
                                                    <th>{{$cashins}}</th>


                                                </tr>
                                                <tr class="alert ">
                                                    <th> Total Cash out</th>
                                                    <th>{{$cashouts}}</th>
                                                </tr>

                                                <tr class="alert alert">
                                                    <th>Net Profit/Loss</th>
                                                    <th>{{$net_sum}}</th>

                                                </tr>

                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-hover">
                                            <thead>
                                                

                                                </tr>
                                            </thead>
                                            <tbody>



                                                <tr>
                                                    <th>&nbsp&nbsp<span class="pull-right"> </span></th>
                                                </tr>



                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-hover ">
                                            <thead>
                                                <tr class="alert alert-danger">
                                                    <th>Cash Out Records</th>

                                                </tr>
                                            </thead>
                                            <tbody>


                                                @foreach($expenditures as $expenditure)
                                                <tr>

                                                
                                                  
                                                    <th>{{ \App\ExpenseCategory::find($expenditure->expense_category)->expense_category_name }} &nbsp&nbsp <span class="pull-right">{{$expenditure->total}}</span></th>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</div>

@endif
@endsection