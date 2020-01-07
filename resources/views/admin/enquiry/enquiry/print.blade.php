<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> Manpower Management System (MMS) </title>

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

<body onload="printEnquiry()">

    
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
                                    <th> S.No </th>
                                    <th> Enquiry By </th>
                                    <th> Email </th>
                                    <th> Phone </th>
                                    <th> Enquiry On </th>
                                    <th> Category </th>
                                    <th> Source </th>
                                    <th> Country </th>
                                    <th> Responded Through </th>
                                    <th>Office Visit</th>
                                </tr>
                            </thead>
                            <tbody>
                           @foreach($enquries as $key=>$enquries)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        {{ $enquries->name }}
                                    </td>
                                    <td>
                                        {{ $enquries->email }}
                                    </td>
                                    <td>
                                        {{ $enquries->phone }}
                                    </td>
                                    <td>
                                        {{ $enquries->date }}
                                    </td>
                                    <?php $enquiry_category = $enquries->category->sortBy('cat_name')->pluck('id'); ?>
                                    <td>
                                        @foreach($enquiry_category as $data)
                                        <li>
                                            {{ \App\EnquiryCategory::find($data)->cat_name }}
                                        </li>
                                        @endforeach
                                    </td>

                                        <?php $enquiry_sources = $enquries->sources->sortBy('name')->pluck('id'); ?>
                                    <td>
                                        @foreach($enquiry_sources as $data)
                                        <li>
                                            {{ \App\EnquirySource::find($data)->name }}
                                        </li>
                                        @endforeach
                                    </td>

                                    <td>{{ $enquries->country }}</td>

                                    <?php $enquiry_responses = \App\EnquiryResponse::where('enquiry_id', $enquries->id)->pluck('enquiry_response_id'); ?>
                                    <td>
                                        @foreach($enquiry_responses as $data)
                                        <li>
                                            {{ \App\EnquirySource::find($data)->name }}
                                        </li>
                                        @endforeach
                                    </td>
                                    <td>@if($enquries->visited==1)Yes @elseif($enquries->visited==0) No @endif </td>

                                    
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

function printEnquiry(){
    window.print();
}
</script>