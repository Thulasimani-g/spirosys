
<x-app-layout>
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Top Permit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Top Permit Reports</li>
                </ol>
            </div>
        </div>
    </x-slot>

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Top Permit List</h3>
            <div class="card-tools">
           
          </div>


        </div>
        <div class="card-body">
     
                <div class="form-group row">
                <label for="from_date" class="col-form-label" >Date<sup><span class="font-weight-bolder text-red">*</span></sup></label>
                <div class="col-sm-3" style="margin-left: 50px;">
                    <div class="input-group">
                         <input type="text" class="form-control"  name="reportrange" id="reportrange" />
                    </div>
                </div>

                  

                    <div class="col" style='margin-left:25px'>

                        <button type="button" id="btn_view" class="btn btn-success mb-3"> View</button>

                      
                    </div>
                </div>
            <h4 id="showMsg"></h4>
               
            <table id="tbl_permit" class="table table-bordered table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th>#</th>
                        <th>Job</th>
                        <th>Borough</th>
                        <th>Street Name</th>
                        <th>Job Type</th>
                        <th>Filling Date </th>
                        <th>Initial Cost</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            
            </table>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">

        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->


    <x-slot name="script">
        <script>
              $(function() {

var start = moment().subtract(1, 'year').startOf('year');
var end = moment().subtract(1, 'year').endOf('year');


function cb(start, end) {
    // Set the input field value to the selected range
    $('#reportrange').val(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));

    // Check which predefined range was selected
    var selectedRange = '';
    var ranges = {
        'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
        'Last Week': [moment().subtract(1, 'week').startOf('week'), moment().subtract(1, 'week').endOf('week')]
    };

    // Compare the selected date range with predefined ranges
    $.each(ranges, function(label, range) {
        if (start.isSame(range[0], 'day') && end.isSame(range[1], 'day')) {
            selectedRange = label;
        }
    });

    // Log or use the selected range
    if (selectedRange) {
        $('#showMsg').text('Top 50 Permits Of '+selectedRange);
        
    } else {
        console.log('Custom date range selected');
    }
}

$('#reportrange').daterangepicker({
    startDate: start,
    endDate: end,
    locale: {
        format: 'DD/MM/YYYY'
    },
    ranges: {
        'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
        'Last Week': [moment().subtract(1, 'week').startOf('week'), moment().subtract(1, 'week').endOf('week')]
    }
}, cb);

cb(start, end);  // Initialize with the current start and end dates

              });
          
            $('.dropdown-menu').click(function(e) {
                e.stopPropagation();
            });

            var tbl_permit = $('#tbl_permit').DataTable({
                "processing": true,
                "serverSide": true,
                "pageLength": 50,
                "lengthMenu": [
                    [25, 50, 100, -1],
                    [25, 50, 100, "All"]
                ],
                "ajax": {
                    "url": "{{ route('report') }}",
                    "data": function(d) {
                        d.reportrange = $('#reportrange').val();
                    

                    }
                },
               
                columns: [{
                        data: "DT_RowIndex",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data:'Job_',
                        name: 'Job_'
                    },
                    {
                        data: 'Borough',
                        name:'Borough'
                    },
                    {
                        data: 'Street_Name',
                        name:'Street_Name',
                        defaultContent: '-'
                    },
                    {
                        data: 'Job_Type',
                        name:'Job_Type',
                        defaultContent: '-'
                    },
                    {
                        data: 'Latest_Action_Date',
                        name:'Latest_Action_Date',
                         defaultContent: '-'

                    },
                    {
                        data:'Initial_Cost',
                        name:'Initial_Cost',
                        defaultContent:''
                    }
                  
                   
                ],
              
            });


            $('#btn_view').click(function(e) {
                e.preventDefault();
                tbl_permit.ajax.reload();
            });
           

        </script>
    </x-slot>

</x-app-layout>
