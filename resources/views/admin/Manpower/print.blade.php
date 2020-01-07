<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> ManPower Management System(MMS) </title>

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

<body onload="printManpower()">

    
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">All Enquiries List</div>
                </div>
                <div class="table-scrollable">
                    <center>
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Personnel Name </th>
                                    <th>Country </th>
                                    <th>Position Applied </th>
                                    <th>Service Interested</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($manpower as $value)
        
                                    <tr>
                                     <td>{{$loop->iteration}}</td>
        
                                     <td>{{$value->name}}</td>
                                     <td>{{$value->finaldetails->country}}</td>
        
                                     <td>{{$value->finaldetails->position_applied }}</td>
                                      @php $student_courses = $value->courses->sortBy('name')->pluck('id'); @endphp
                                      <td>
                                          @foreach($student_courses as $data)
                                              <li>
                                                  {{ \App\Course::find($data)->name }}
                                              </li>
                                          @endforeach
                                      </td>
                                    </tr>
                                 @endforeach
                            </tbody>
                        </table>
                    </div>
                    </center>
                </div>    
            </div>
        </div>
    </div>
                                       




</body>

<script>

function printManpower(){
    window.print();
}
</script>