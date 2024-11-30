<x-app-layout>
    <x-slot name="header">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h1>Top Permit Reports</h1>
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
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Top Permit List</h3>
            <div class="card-tools">
               
            </div>
        </div>

        <div class="card-body">
            <div class="row mb-3">
                <!-- Date Range Input -->
                <div class="col-sm-4">
                    <label for="reportrange" class="col-form-label">
                        Date Range <sup class="font-weight-bolder text-danger">*</sup>
                    </label>
                    <input type="text" class="form-control" name="reportrange" id="reportrange" />
                </div>

                <!-- View Button -->
                <div class="col-sm-2 d-flex align-items-end">
                    <button type="button" id="btn_view" class="btn btn-success w-100">View</button>
                </div>
            </div>

            <h4 id="showMsg" class="mb-4"></h4>

            <!-- Permit Data Table -->
            <table id="tbl_permit" class="table table-bordered table-hover">
                <thead class="bg-primary">
                    <tr>
                        <th>#</th>
                        <th>Job</th>
                        <th>Borough</th>
                        <th>Street Name</th>
                        <th>Job Type</th>
                        <th>Filling Date</th>
                        <th>Initial Cost</th>
                    </tr>
                </thead>
                <tbody>
                  
                </tbody>
            </table>
        </div>

        <div class="card-footer">
           
        </div>
    </div>
    <!-- /.card -->

    <x-slot name="script">
        <script>
            $(function() {
                // Date Range Picker Setup
                var start = moment().subtract(1, 'year').startOf('year');
                var end = moment().subtract(1, 'year').endOf('year');

                function cb(start, end) {
                    $('#reportrange').val(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));

                    var selectedRange = '';
                    var ranges = {
                        'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                        'Last Week': [moment().subtract(1, 'week').startOf('week'), moment().subtract(1, 'week').endOf('week')]
                    };

                    $.each(ranges, function(label, range) {
                        if (start.isSame(range[0], 'day') && end.isSame(range[1], 'day')) {
                            selectedRange = label;
                        }
                    });

                    if (selectedRange) {
                        $('#showMsg').text('Top 50 Permits Of ' + selectedRange);
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

                // DataTable Initialization
                var tbl_permit = $('#tbl_permit').DataTable({
                    processing: true,
                    serverSide: true,
                    pageLength: 50,
                    lengthMenu: [
                        [25, 50, 100, -1],
                        [25, 50, 100, "All"]
                    ],
                    ajax: {
                        url: "{{ route('report') }}",
                        data: function(d) {
                            d.reportrange = $('#reportrange').val();
                        }
                    },
                    columns: [
                        { data: "DT_RowIndex", orderable: false, searchable: false },
                        { data: 'Job_', name: 'Job_' },
                        { data: 'Borough', name: 'Borough' },
                        { data: 'Street_Name', name: 'Street_Name', defaultContent: '-' },
                        { data: 'Job_Type', name: 'Job_Type', defaultContent: '-' },
                        { data: 'Latest_Action_Date', name: 'Latest_Action_Date', defaultContent: '-' },
                        { data: 'Initial_Cost', name: 'Initial_Cost', defaultContent: '' }
                    ]
                });

                // Reload data when view button is clicked
                $('#btn_view').click(function(e) {
                    e.preventDefault();
                    tbl_permit.ajax.reload();
                });
            });
        </script>
    </x-slot>
</x-app-layout>
