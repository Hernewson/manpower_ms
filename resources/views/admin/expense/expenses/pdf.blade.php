<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> Manpower Management System (IMS)</title>

  <style type="text/css">
    table {
  border-collapse: collapse;
  width: 100%;
}

table, th, td {
  border: 0.1px solid black;
  text-align: center;
}

  </style>
</head>
<body>

    <div class="page-content">
        <div class='row'>
            <div class='col-12' >
                <div class="col-lg-6 col-md-6 col-sm-6" style="float:left">
                    <img src="{{asset('public/adminAssets/assets/img/gcn.png')}}" style="padding-bottom:20px; height:60px; width:100px;">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6" style="float:right; right: -15px;">
                <p>Date: ......................................</p>
            </div>
        <div>
        <br><br><br><br>
        
        
        



        <div class='row'>
            <div class='col-12' ><center>
                <p>Subject:Expenses on {{$expense->expensecategory->expense_category_name}}</p>
            </center>
            </div>
        <div>
        <br><br>
        
        
        <br>
        <br>


        <div class='row'>
            <div >
                Following Amount was Received by {{$expense->received_by}}
            </div>
        <div>
        <br><br>
        
        
        <br>
        <br>

        <div class='row'>
                <div class='col-12' >
                    <center>
                        <div class="page-bar">
                            <div class="page-title-breadcrumb">
                                <div class=" pull-left">
                                    <div class="page-title"> Expenses Details</div>
                                </div>
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                            <thead>
                                                <tr>

                                                    <th> Received By </th>
                                                    <th> Expense Category </th>
                                                    <th> Amount </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>

                                                    <td>{{$expense->received_by}}</td>
                                                    <td>{{$expense->expensecategory->expense_category_name}}</td>
                                                    <td>{{$expense->amount}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                        </div>
                    </center>
                </div>
        </div>
        <br>
        <br><br><br><br><br>
        
        

            <br>
            <br><br>
            <br><br>
            <br>
            <br>
            <br><br>
            <br><br>
            <br>
            <br>
            <br><br>
            <br><br>
            <br>
            <br>



            <div class='row'>
            <div class='col-12' style="float:right">
                <p><strong>Signature</strong></p>
                <br>
                <p>............................................</p>
            </div>
        </div>
    </div>

</body>
</html>
