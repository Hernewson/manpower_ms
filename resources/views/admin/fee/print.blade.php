<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> Institute Management System (IMS)</title>

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

<body onload="printFees()">

    
      <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">All Fees List</div>
                </div>
                <div class="table-scrollable">
                    <center>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    
                                    <th> Applicant  </th>
                                    
                                    <th> Fee Title </th>
                                    <th> Fee Paid</th>
                                    <th>Mode Of Payment</th>
                                    <th>Received By</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($fees as $fee)
                                <tr>
                                    <td>{{ $loop->index +1 }}</td>
                                    
                                    <td>
                                       {{ $fee->student_id }}
                                        </td>
                                        
                                            
                                        
                                        <td>
                                     {{ $fee->title }}</td>
                                    <td>RS. {{ $fee->fees_paid }}</td>
                                    <td>{{ $fee->mode_of_payment }}</td>
                                    <td>{{ $fee->received_by }}</td>
                                    
                                   
                                </tr>
                                @endforeach
                            </tbody> 
                        </table>
                    </center>
                </div>
            </div>
        </div>
    </div>




</body>

<script>

function printFees(){
    window.print();
}
</script>